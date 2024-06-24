<?php

namespace PikseraPackages\Console\Commands;

use Illuminate\Console\Command;

class ReloadDatabaseCommand extends Command
{
    protected $name = 'piksera:reload-database';
    protected $description = 'Reload Piksera Database';

    public function handle()
    {
        //echo 1;
        mw_post_update();
    }
}
