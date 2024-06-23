<?php

namespace PikseraPackages\Modules\Newsletter\Console\Commands;

use Illuminate\Console\Command;
use PikseraPackages\Modules\Newsletter\Models\NewsletterCampaign;
use PikseraPackages\Modules\Newsletter\Models\NewsletterCampaignsSendLog;

class ProcessCampaigns extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'newsletter:process-campaigns';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process campaigns';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $processCampaigns = new \PikseraPackages\Modules\Newsletter\ProcessCampaigns();
        $processCampaigns->setLogger($this);
        $processCampaigns->run();

        return 0;
    }
}
