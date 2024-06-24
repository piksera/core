<?php

namespace PikseraPackages\Package\Helpers;


use Composer\Package\PackageInterface;


class CoreUpdateInstaller extends BaseInstaller
{


    protected $folder_base = './piksera-core-update/';
    protected $supports = 'piksera-core-update';

    public function getInstallPath(PackageInterface $package)
    {

        return $this->folder_base . 'install-update';
    }


    public function supports($packageType)
    {
        return $this->supports === $packageType;
    }
}