<?php

namespace PikseraPackages\Modules\Admin\ImportExportTool\Http\Livewire\Admin;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use LivewireUI\Modal\ModalComponent;
use PikseraPackages\Admin\Http\Livewire\AdminModalComponent;
use PikseraPackages\App\Http\RequestRoute;
use PikseraPackages\Category\Models\Category;
use PikseraPackages\Content\Models\Content;
use PikseraPackages\Export\SessionStepper;
use PikseraPackages\Import\DatabaseSave;
use PikseraPackages\Modules\Admin\ImportExportTool\ImportFeedToDatabase;
use PikseraPackages\Modules\Admin\ImportExportTool\ImportMapping\FeedMapToArray;
use PikseraPackages\Modules\Admin\ImportExportTool\Models\ImportFeed;
use PikseraPackages\Multilanguage\MultilanguageHelpers;
use PikseraPackages\Product\Models\Product;

class StartImportingModal extends AdminModalComponent
{
    public $error = false;
    public $done = false;
    public $import_log = [
        'current_step'=>0,
        'total_steps'=>0,
        'percentage'=>0,
    ];
    public $import_feed_session_id = false;
    public $import_feed;

    public $listeners = [
        'importExportToolNextStep'=>'nextStep',
        'viewReportAndCloseModal'=>'viewReportAndCloseModal',
    ];

    public function nextStep()
    {
        SessionStepper::setSessionId($this->import_feed_session_id);
        SessionStepper::nextStep();

        $this->import_log['current_step'] = SessionStepper::currentStep();
        $this->import_log['percentage'] = SessionStepper::percentage();

        $import = new ImportFeedToDatabase();
        $import->setBatchImporting(true);

        $batchStep = ($this->import_log['current_step'] - 1);
        $import->setBatchStep($batchStep);

        $import->setImportFeedId($this->import_feed->id);

        $importStatus = $import->start();

        if (isset($importStatus['error'])) {
            $this->error = $importStatus['error'];
            return [];
        }

        if (isset($importStatus['finished']) && $importStatus['finished']) {
            $this->done = true;
            return array("success"=>"Done! All steps are finished.");
        }

        $this->dispatchBrowserEvent('nextStepCompleted', []);

        return [];
    }

    public function viewReportAndCloseModal()
    {
        $this->closeModal();
        $this->emit('importingFinished');
    }

    public function clearLog()
    {
        // clear log
    }

    public function setLogInfo($log)
    {
        $this->logDetails = $log;
    }

    public function mount($importFeedId = false)
    {
        if(!$importFeedId){
            return;
        }
        $this->import_feed = ImportFeed::where('id', $importFeedId)->first();
        if ($this->import_feed == null) {
            return redirect(route('admin.import-export-tool.index'));
        }

        $this->import_log['total_steps'] = $this->import_feed->split_to_parts;
        $this->import_feed_session_id = SessionStepper::generateSessionId($this->import_feed->split_to_parts);

    }

    public function render()
    {
        return view('import_export_tool::admin.livewire-start-importing-modal');
    }
}
