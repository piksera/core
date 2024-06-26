<?php

/*
 * This file is part of Composer.
 *
 * (c) Nils Adermann <naderman@naderman.de>
 *     Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

//namespace Composer\Installer;
namespace PikseraPackages\Package\Installer;


use Composer\Installer\InstallationManager as InstallationManagerComposer;



use Composer\IO\IOInterface;
use Composer\IO\ConsoleIO;
use Composer\Package\PackageInterface;
use Composer\Package\AliasPackage;
use Composer\Repository\RepositoryInterface;
use Composer\Repository\InstalledRepositoryInterface;
use Composer\DependencyResolver\Operation\OperationInterface;
use Composer\DependencyResolver\Operation\InstallOperation;
use Composer\DependencyResolver\Operation\UpdateOperation;
use Composer\DependencyResolver\Operation\UninstallOperation;
use Composer\DependencyResolver\Operation\MarkAliasInstalledOperation;
use Composer\DependencyResolver\Operation\MarkAliasUninstalledOperation;
use Composer\EventDispatcher\EventDispatcher;
use Composer\Util\StreamContextFactory;
use Composer\Util\Loop;
use React\Promise\PromiseInterface;
use Composer\Installer\InstallerInterface ;



/**
 * Package operation manager.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 * @author Jordi Boggiano <j.boggiano@seld.be>
 * @author Nils Adermann <naderman@naderman.de>
 */

class InstallationManager extends InstallationManagerComposer
{
    /** @var array<InstallerInterface> */
    private $installers = array();
    /** @var array<string, InstallerInterface> */
    private $cache = array();
    /** @var array<string, array<PackageInterface>> */
    private $notifiablePackages = array();
    /** @var Loop */
    private $loop;
    /** @var IOInterface */
    private $io;
    /** @var EventDispatcher */
    private $eventDispatcher;
    /** @var bool */
    private $outputProgress;

    public function __construct(Loop $loop, IOInterface $io, EventDispatcher $eventDispatcher = null)
    {
        $this->loop = $loop;
        $this->io = $io;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function reset()
    {
        $this->notifiablePackages = array();
    }

    /**
     * Adds installer
     *
     * @param InstallerInterface $installer installer instance
     */
    public function addInstaller(InstallerInterface $installer)
    {
        array_unshift($this->installers, $installer);
        $this->cache = array();
    }

    /**
     * Removes installer
     *
     * @param InstallerInterface $installer installer instance
     */
    public function removeInstaller(InstallerInterface $installer)
    {
        if (false !== ($key = array_search($installer, $this->installers, true))) {
            array_splice($this->installers, $key, 1);
            $this->cache = array();
        }
    }

    /**
     * Disables plugins.
     *
     * We prevent any plugins from being instantiated by simply
     * deactivating the installer for them. This ensure that no third-party
     * code is ever executed.
     */
    public function disablePlugins()
    {
        foreach ($this->installers as $i => $installer) {
            if (!$installer instanceof PluginInstaller) {
                continue;
            }

            unset($this->installers[$i]);
        }
    }

    /**
     * Returns installer for a specific package type.
     *
     * @param string $type package type
     *
     * @throws \InvalidArgumentException if installer for provided type is not registered
     * @return InstallerInterface
     */
    public function getInstaller($type)
    {
        $type = strtolower($type);

        if (isset($this->cache[$type])) {
            return $this->cache[$type];
        }

        foreach ($this->installers as $installer) {
            if ($installer->supports($type)) {
                return $this->cache[$type] = $installer;
            }
        }

        throw new \InvalidArgumentException('Unknown installer type: '.$type);
    }

    /**
     * Checks whether provided package is installed in one of the registered installers.
     *
     * @param InstalledRepositoryInterface $repo    repository in which to check
     * @param PackageInterface             $package package instance
     *
     * @return bool
     */
    public function isPackageInstalled(InstalledRepositoryInterface $repo, PackageInterface $package)
    {
        if ($package instanceof AliasPackage) {
            return $repo->hasPackage($package) && $this->isPackageInstalled($repo, $package->getAliasOf());
        }

        return $this->getInstaller($package->getType())->isInstalled($repo, $package);
    }

    /**
     * Install binary for the given package.
     * If the installer associated to this package doesn't handle that function, it'll do nothing.
     *
     * @param PackageInterface $package Package instance
     */
    public function ensureBinariesPresence(PackageInterface $package)
    {
        try {
            $installer = $this->getInstaller($package->getType());
        } catch (\InvalidArgumentException $e) {
            // no installer found for the current package type (@see `getInstaller()`)
            return;
        }

        // if the given installer support installing binaries
        if ($installer instanceof BinaryPresenceInterface) {
            $installer->ensureBinariesPresence($package);
        }
    }

    /**
     * Executes solver operation.
     *
     * @param RepositoryInterface  $repo       repository in which to add/remove/update packages
     * @param OperationInterface[] $operations operations to execute
     * @param bool                 $devMode    whether the install is being run in dev mode
     * @param bool                 $runScripts whether to dispatch script events
     */
    public function execute(RepositoryInterface $repo, array $operations, $devMode = true, $runScripts = true)
    {
        $promises = array();
        $cleanupPromises = array();

        $loop = $this->loop;
        $runCleanup = function () use (&$cleanupPromises, $loop) {
            $promises = array();

            $loop->abortJobs();

            foreach ($cleanupPromises as $cleanup) {
                $promises[] = new \React\Promise\Promise(function ($resolve, $reject) use ($cleanup) {
                    $promise = $cleanup();
                    if (!$promise instanceof PromiseInterface) {
                        $resolve();
                    } else {
                        $promise->then(function () use ($resolve) {
                            $resolve();
                        });
                    }
                });
            }

            if (!empty($promises)) {
                $loop->wait($promises);
            }
        };

        $handleInterruptsUnix = function_exists('pcntl_async_signals') && function_exists('pcntl_signal');
       // $handleInterruptsWindows = function_exists('sapi_windows_set_ctrl_handler');
        $handleInterruptsWindows = false;
        $prevHandler = null;
        $windowsHandler = null;
        if ($handleInterruptsUnix) {
            pcntl_async_signals(true);
            $prevHandler = pcntl_signal_get_handler(SIGINT);
            pcntl_signal(SIGINT, function ($sig) use ($runCleanup, $prevHandler) {
                $runCleanup();

                if (!in_array($prevHandler, array(SIG_DFL, SIG_IGN), true)) {
                    call_user_func($prevHandler, $sig);
                }

                exit(130);
            });
        }
        if ($handleInterruptsWindows) {
            $windowsHandler = function () use ($runCleanup) {
                $runCleanup();

                exit(130);
            };
            sapi_windows_set_ctrl_handler($windowsHandler, true);
        }

        try {
            foreach ($operations as $index => $operation) {
                $opType = $operation->getOperationType();

                // ignoring alias ops as they don't need to execute anything at this stage
                if (!in_array($opType, array('update', 'install', 'uninstall'))) {
                    continue;
                }

                if ($opType === 'update') {
                    $package = $operation->getTargetPackage();
                    $initialPackage = $operation->getInitialPackage();
                } else {
                    $package = $operation->getPackage();
                    $initialPackage = null;
                }
                $installer = $this->getInstaller($package->getType());

                $cleanupPromises[$index] = function () use ($opType, $installer, $package, $initialPackage) {
                    // avoid calling cleanup if the download was not even initialized for a package
                    // as without installation source configured nothing will work
                    if (!$package->getInstallationSource()) {
                        return;
                    }

                    return $installer->cleanup($opType, $package, $initialPackage);
                };

                if ($opType !== 'uninstall') {
                    $promise = $installer->download($package, $initialPackage);
                    if ($promise) {
                        $promises[] = $promise;
                    }
                }
            }

            // execute all downloads first
            if (!empty($promises)) {
                $progress = null;
                if ($this->outputProgress && $this->io instanceof ConsoleIO && !$this->io->isDebug() && count($promises) > 1) {
                    $progress = $this->io->getProgressBar();
                }
                $this->loop->wait($promises, $progress);
                if ($progress) {
                    $progress->clear();
                }
            }

            // execute operations in batches to make sure every plugin is installed in the
            // right order and activated before the packages depending on it are installed
            $batches = array();
            $batch = array();
            foreach ($operations as $index => $operation) {
                if (in_array($operation->getOperationType(), array('update', 'install'), true)) {
                    $package = $operation->getOperationType() === 'update' ? $operation->getTargetPackage() : $operation->getPackage();
                    if ($package->getType() === 'composer-plugin' || $package->getType() === 'composer-installer') {
                        if ($batch) {
                            $batches[] = $batch;
                        }
                        $batches[] = array($index => $operation);
                        $batch = array();

                        continue;
                    }
                }
                $batch[$index] = $operation;
            }

            if ($batch) {
                $batches[] = $batch;
            }

            foreach ($batches as $batch) {
                $this->executeBatch($repo, $batch, $cleanupPromises, $devMode, $runScripts, $operations);
            }
        } catch (\Exception $e) {
            $runCleanup();

            if ($handleInterruptsUnix) {
                pcntl_signal(SIGINT, $prevHandler);
            }
            if ($handleInterruptsWindows) {
                sapi_windows_set_ctrl_handler($prevHandler, false);
            }

            throw $e;
        }

        if ($handleInterruptsUnix) {
            pcntl_signal(SIGINT, $prevHandler);
        }
        if ($handleInterruptsWindows) {
            sapi_windows_set_ctrl_handler($prevHandler, false);
        }

        // do a last write so that we write the repository even if nothing changed
        // as that can trigger an update of some files like InstalledVersions.php if
        // running a new composer version
        $repo->write($devMode, $this);
    }

    /**
     * @param array $operations List of operations to execute in this batch
     * @param array $allOperations Complete list of operations to be executed in the install job, used for event listeners
     */
    private function executeBatch(RepositoryInterface $repo, array $operations, array $cleanupPromises, $devMode, $runScripts, array $allOperations)
    {
        foreach ($operations as $index => $operation) {
            $opType = $operation->getOperationType();

            // ignoring alias ops as they don't need to execute anything
            if (!in_array($opType, array('update', 'install', 'uninstall'))) {
                // output alias ops in debug verbosity as they have no output otherwise
                if ($this->io->isDebug()) {
                    $this->io->writeError('  - ' . $operation->show(false));
                }
                $this->$opType($repo, $operation);

                continue;
            }

            if ($opType === 'update') {
                $package = $operation->getTargetPackage();
                $initialPackage = $operation->getInitialPackage();
            } else {
                $package = $operation->getPackage();
                $initialPackage = null;
            }
            $installer = $this->getInstaller($package->getType());

            $event = 'Composer\Installer\PackageEvents::PRE_PACKAGE_'.strtoupper($opType);
            if (defined($event) && $runScripts && $this->eventDispatcher) {
                $this->eventDispatcher->dispatchPackageEvent(constant($event), $devMode, $repo, $allOperations, $operation);
            }

            $dispatcher = $this->eventDispatcher;
            $installManager = $this;
            $io = $this->io;

            $promise = $installer->prepare($opType, $package, $initialPackage);
            if (!$promise instanceof PromiseInterface) {
                $promise = \React\Promise\resolve();
            }

            $promise = $promise->then(function () use ($opType, $installManager, $repo, $operation) {
                return $installManager->$opType($repo, $operation);
            })->then($cleanupPromises[$index])
                ->then(function () use ($opType, $runScripts, $dispatcher, $installManager, $devMode, $repo, $allOperations, $operation) {
                    $repo->write($devMode, $installManager);

                    $event = 'Composer\Installer\PackageEvents::POST_PACKAGE_'.strtoupper($opType);
                    if (defined($event) && $runScripts && $dispatcher) {
                        $dispatcher->dispatchPackageEvent(constant($event), $devMode, $repo, $allOperations, $operation);
                    }
                }, function ($e) use ($opType, $package, $io) {
                    $io->writeError('    <error>' . ucfirst($opType) .' of '.$package->getPrettyName().' failed</error>');

                    throw $e;
                });

            $promises[] = $promise;
        }

        // execute all prepare => installs/updates/removes => cleanup steps
        if (!empty($promises)) {
            $progress = null;
            if ($this->outputProgress && $this->io instanceof ConsoleIO && !$this->io->isDebug() && count($promises) > 1) {
                $progress = $this->io->getProgressBar();
            }
            $this->loop->wait($promises, $progress);
            if ($progress) {
                $progress->clear();
            }
        }
    }

    /**
     * Executes install operation.
     *
     * @param RepositoryInterface $repo      repository in which to check
     * @param InstallOperation    $operation operation instance
     */
    public function install(RepositoryInterface $repo, InstallOperation $operation)
    {
        $package = $operation->getPackage();
        $installer = $this->getInstaller($package->getType());
        $promise = $installer->install($repo, $package);
        $this->markForNotification($package);

        return $promise;
    }

    /**
     * Executes update operation.
     *
     * @param RepositoryInterface $repo      repository in which to check
     * @param UpdateOperation     $operation operation instance
     */
    public function update(RepositoryInterface $repo, UpdateOperation $operation)
    {
        $initial = $operation->getInitialPackage();
        $target = $operation->getTargetPackage();

        $initialType = $initial->getType();
        $targetType = $target->getType();

        if ($initialType === $targetType) {
            $installer = $this->getInstaller($initialType);
            $promise = $installer->update($repo, $initial, $target);
            $this->markForNotification($target);
        } else {
            $this->getInstaller($initialType)->uninstall($repo, $initial);
            $installer = $this->getInstaller($targetType);
            $promise = $installer->install($repo, $target);
        }

        return $promise;
    }

    /**
     * Uninstalls package.
     *
     * @param RepositoryInterface $repo      repository in which to check
     * @param UninstallOperation  $operation operation instance
     */
    public function uninstall(RepositoryInterface $repo, UninstallOperation $operation)
    {
        $package = $operation->getPackage();
        $installer = $this->getInstaller($package->getType());

        return $installer->uninstall($repo, $package);
    }

    /**
     * Executes markAliasInstalled operation.
     *
     * @param RepositoryInterface         $repo      repository in which to check
     * @param MarkAliasInstalledOperation $operation operation instance
     */
    public function markAliasInstalled(RepositoryInterface $repo, MarkAliasInstalledOperation $operation)
    {
        $package = $operation->getPackage();

        if (!$repo->hasPackage($package)) {
            $repo->addPackage(clone $package);
        }
    }

    /**
     * Executes markAlias operation.
     *
     * @param RepositoryInterface           $repo      repository in which to check
     * @param MarkAliasUninstalledOperation $operation operation instance
     */
    public function markAliasUninstalled(RepositoryInterface $repo, MarkAliasUninstalledOperation $operation)
    {
        $package = $operation->getPackage();

        $repo->removePackage($package);
    }

    /**
     * Returns the installation path of a package
     *
     * @param  PackageInterface $package
     * @return string           path
     */
    public function getInstallPath(PackageInterface $package)
    {
        $installer = $this->getInstaller($package->getType());

        return $installer->getInstallPath($package);
    }

    public function setOutputProgress($outputProgress)
    {
        $this->outputProgress = $outputProgress;
    }

    public function notifyInstalls(IOInterface $io)
    {
        foreach ($this->notifiablePackages as $repoUrl => $packages) {
            $repositoryName = parse_url($repoUrl, PHP_URL_HOST);
            if ($io->hasAuthentication($repositoryName)) {
                $auth = $io->getAuthentication($repositoryName);
                $authStr = base64_encode($auth['username'] . ':' . $auth['password']);
                $authHeader = 'Authorization: Basic '.$authStr;
            }

            // non-batch API, deprecated
            if (strpos($repoUrl, '%package%')) {
                foreach ($packages as $package) {
                    $url = str_replace('%package%', $package->getPrettyName(), $repoUrl);

                    $params = array(
                        'version' => $package->getPrettyVersion(),
                        'version_normalized' => $package->getVersion(),
                    );
                    $opts = array('http' =>
                        array(
                            'method' => 'POST',
                            'header' => array('Content-type: application/x-www-form-urlencoded'),
                            'content' => http_build_query($params, '', '&'),
                            'timeout' => 3,
                        ),
                    );
                    if (isset($authHeader)) {
                        $opts['http']['header'][] = $authHeader;
                    }

                    $context = StreamContextFactory::getContext($url, $opts);
                    @file_get_contents($url, false, $context);
                }

                continue;
            }

            $postData = array('downloads' => array());
            foreach ($packages as $package) {
                $postData['downloads'][] = array(
                    'name' => $package->getPrettyName(),
                    'version' => $package->getVersion(),
                );
            }

            $opts = array('http' =>
                array(
                    'method' => 'POST',
                    'header' => array('Content-Type: application/json'),
                    'content' => json_encode($postData),
                    'timeout' => 6,
                ),
            );
            if (isset($authHeader)) {
                $opts['http']['header'][] = $authHeader;
            }

            $context = StreamContextFactory::getContext($repoUrl, $opts);
            @file_get_contents($repoUrl, false, $context);
        }

        $this->reset();
    }

    private function markForNotification(PackageInterface $package)
    {
        if ($package->getNotificationUrl()) {
            $this->notifiablePackages[$package->getNotificationUrl()][$package->getName()] = $package;
        }
    }
}

