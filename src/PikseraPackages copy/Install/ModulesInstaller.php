<?php

namespace PikseraPackages\Install;

use PikseraPackages\Database\Utils as DbUtils;
use Illuminate\Support\Facades\Schema as DbSchema;

class ModulesInstaller
{
    public $logger = null;

    public function run()
    {

        if (!DbSchema::hasTable('modules')) {
            $schema = [];
            $schema[] = new Schema\Base();
            $builder = new DbUtils();

            foreach ($schema as $data) {
                if (method_exists($data, 'get')) {
                    $schemaArray = $data->get();
                    if (is_array($schemaArray)) {
                        foreach ($schemaArray as $table => $columns) {
                            $this->log('Setting up table "' . $table . '"');
                            $builder->build_table($table, $columns);
                        }
                    }
                }
            }
        }

        mw()->module_manager->logger = $this->logger;
        mw()->module_manager->install();
        scan_for_modules(['no_cache'=>true,'reload_modules'=>true,'cleanup_db'=>true]);
        scan_for_elements(['no_cache'=>true,'reload_modules'=>true,'cleanup_db'=>true]);
    }

    public function log($text)
    {
        if (is_object($this->logger) and method_exists($this->logger, 'log')) {
            $this->logger->log($text);
        }
    }
}
