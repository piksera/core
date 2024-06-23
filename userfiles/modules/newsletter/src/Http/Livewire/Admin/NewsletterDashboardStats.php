<?php

namespace PikseraPackages\Modules\Newsletter\Http\Livewire\Admin;

use Livewire\Component;
use PikseraPackages\Modules\Newsletter\Models\NewsletterCampaign;
use PikseraPackages\Modules\Newsletter\Models\NewsletterCampaignsSendLog;
use PikseraPackages\Modules\Newsletter\Models\NewsletterList;
use PikseraPackages\Modules\Newsletter\Models\NewsletterSubscriber;

class NewsletterDashboardStats extends Component
{
    public $campaignsCount = 0;
    public $listsCount = 0;
    public $emailsSentCount = 0;
    public $subscribersCount = 0;

    public function render()
    {
        $this->campaignsCount = NewsletterCampaign::count();
        $this->listsCount = NewsletterList::count();
        $this->emailsSentCount = NewsletterCampaignsSendLog::count();
        $this->subscribersCount = NewsletterSubscriber::count();

        return view('piksera-module-newsletter::livewire.admin.dashboard-stats');
    }

}
