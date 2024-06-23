<?php

namespace PikseraPackages\Modules\Newsletter\Http\Livewire\Admin;

use Livewire\WithPagination;
use PikseraPackages\Admin\Http\Livewire\AdminModalComponent;
use PikseraPackages\Modules\Newsletter\Models\NewsletterCampaign;
use PikseraPackages\Modules\Newsletter\Models\NewsletterCampaignsSendLog;

class NewsletterCampaignsLogModal extends AdminModalComponent
{
    use WithPagination;

    public $campaignId = 0;

    public function render()
    {
        $campaignLog = null;
        $findCampaign = NewsletterCampaign::where('id', $this->campaignId)->first();
        if ($findCampaign) {
            $findCampaignSendLog = NewsletterCampaignsSendLog::where('campaign_id', $findCampaign->id)
                ->where('is_sent', 1)
                ->whereHas('subscriber')
                ->with('subscriber')
                ->paginate(10);

            if ($findCampaignSendLog) {
                $campaignLog = $findCampaignSendLog;
            }
        }

        return view('piksera-module-newsletter::livewire.admin.campaigns-log-modal',[
            'campaign' => $findCampaign,
            'campaignLog' => $campaignLog
        ]);
    }

    public function mount($campaignId = 0)
    {
        $this->campaignId = $campaignId;
    }
}
