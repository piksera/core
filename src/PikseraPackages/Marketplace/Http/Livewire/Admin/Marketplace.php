<?php

namespace PikseraPackages\Marketplace\Http\Livewire\Admin;

use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;
use PikseraPackages\Admin\Http\Livewire\AdminComponent;
use PikseraPackages\Package\PikseraComposerClient;
use PikseraPackages\Package\PikseraComposerPackage;

class Marketplace extends AdminComponent
{
    use WithPagination;

    public $keyword = '';
    public $marketplace;
    public $category = 'piksera-template';

    public $queryString = [
        'keyword',
        'category',
        'page',
    ];

    public function updatedKeyword($keyword)
    {
        $this->filter();
        $this->resetPage();
    }

    public function filterCategory($category)
    {
        $this->category = $category;
        $this->filter();
        $this->resetPage();
    }

    public function mount()
    {
        $this->filter();
    }

    public function reloadPackages()
    {
        Cache::forget('livewire-marketplace');
        $this->filter();
    }

    public function filter()
    {

        $packages = Cache::remember('livewire-marketplace', Carbon::now()->addHours(12), function () {
            $marketplace = new PikseraComposerClient();
            return $marketplace->search();
        });

        $latestVersions = [];

        $allowedCategories = [
            'piksera-module',
            'piksera-template'
        ];
        if (!empty($this->category)) {
            if ($this->category !== 'all') {
                $allowedCategories = [];
                $allowedCategories[] = $this->category;
            }
        }
        foreach ($packages as $packageName=>$package) {

            $latestVersionPackage = end($package);
            if (!isset($latestVersionPackage['target-dir'])) {
                continue;
            }

            if (isset($latestVersionPackage['type']) && !in_array($latestVersionPackage['type'], $allowedCategories)) {
                continue;
            }

            $searchKeywords = [];
            if (isset($latestVersionPackage['keywords']) && is_array($latestVersionPackage['keywords'])) {
                $searchKeywords = array_merge($searchKeywords, $latestVersionPackage['keywords']);
            }

            if (isset($latestVersionPackage['extra']['categories']) && is_array($latestVersionPackage['extra']['categories'])) {
                $searchKeywords = array_merge($searchKeywords, $latestVersionPackage['extra']['categories']);
            }

            array_walk($searchKeywords, function(&$value) {
                $value = mb_strtolower($value);
            });

            if (!empty($this->keyword)) {
                $founded = false;
                if (in_array(mb_strtolower(trim($this->keyword)), $searchKeywords)) {
                    $founded = true;
                }


                if (isset($latestVersionPackage['description'])) {
                    if (mb_strpos(mb_strtolower($latestVersionPackage['description']), mb_strtolower(trim($this->keyword))) !== false) {
                        $founded = true;
                    }
                }
                if (!$founded) {
                    continue;
                }
            }
            $latestVersionPackage = PikseraComposerPackage::format($latestVersionPackage);

            $latestVersions[$packageName] = $latestVersionPackage;
        }

        $this->marketplace = $latestVersions;
    }

    /**

     * The attributes that are mass assignable.

     *
     * @var array
     */
    public function paginate($items, $perPage = 25, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function render()
    {
        $marketplacePagination = $this->paginate($this->marketplace);

        return view('marketplace::admin.marketplace.livewire.index',compact('marketplacePagination'));
    }
}
