<?php
namespace PikseraPackages\PikseraUI\Http\Livewire;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Livewire\WithPagination;
use LivewireUI\Modal\ModalComponent;
use PikseraPackages\Template\Adapters\GoogleFontDownloader;
use PikseraPackages\Utils\Misc\GoogleFonts;

class FontPickerModalComponent extends ModalComponent
{
    use WithPagination;

    public $modalSettings = [
        'skin'=>'black',
        'size'=>'large',
        'padding'=> '0px',
        'background' => 'white',
        'width' => '700px',
        'height' => '700px',
        'overlay' => true,
        'overlayClose' => true,
        'closeHandleSelector'=>'#js-modal-livewire-ui-close',
        'draggableHandleSelector'=>'#js-modal-livewire-ui-draggable-handle',
    ];

    public $search = '';
    public $category = 'all';
    public $categories = [
        'all' => 'All',
        'favorites' => 'Favorites',
        'cyrillic' => 'Cyrillic',
        'latin' => 'Latin',
        'sans-serif' => 'Sans Serif',
        'handwriting' => 'Handwriting',
        'display' => 'Display',
    ];

    public function removeFavorite($fontFamily)
    {
        $favoritesFonts = GoogleFonts::getEnabledFonts();

        $newFavorites = [];
        if (!empty($favoritesFonts)) {
            foreach ($favoritesFonts as $font) {
                if ($font !== $fontFamily) {
                    $newFavorites[] = $font;
                }
            }
        }

        if (!empty($newFavorites)) {
            save_option("enabled_custom_fonts", json_encode($newFavorites), "template");
        } else {
            save_option("enabled_custom_fonts", json_encode([]), "template");
        }

    }

    public function favorite($fontFamily)
    {
        $fontsPath = userfiles_path() . 'fonts';
        if (!is_dir($fontsPath)) {
            mkdir_recursive($fontsPath);
        }

        $googleFontDomain = \PikseraPackages\Utils\Misc\GoogleFonts::getDomain();
        $fontUrl = str_replace('%2B', '+', $fontFamily);
        $fontUrl = urlencode($fontUrl);

        $downloader = new GoogleFontDownloader();
        $downloader->setOutputPath($fontsPath);
        $downloader->addFontUrl("https://{$googleFontDomain}/css?family={$fontUrl}:300italic,400italic,600italic,700italic,800italic,400,600,800,700,300&subset=latin,cyrillic-ext,greek-ext,greek,vietnamese,latin-ext,cyrillic");
        $downloader->download();

        $newFavorites = [];
        $favoritesFonts = GoogleFonts::getEnabledFonts();

        if (is_array($favoritesFonts) && !empty($favoritesFonts)) {
            $newFavorites = array_merge($newFavorites, $favoritesFonts);
            $findFont = false;
            foreach ($favoritesFonts as $font) {
                if ($font == $fontFamily) {
                    $findFont = true;
                }
            }
            if (!$findFont) {
                $newFavorites[] = $fontFamily;
            }
        } else {
            $newFavorites[] = $fontFamily;
        }

        save_option("enabled_custom_fonts", json_encode($newFavorites), "template");

        $this->dispatchBrowserEvent('fontAddedToFavorites',[
            'fontFamily' => $fontFamily
        ]);

    }

    public function render()
    {
        $fonts = get_editor_fonts();
        $filteredFonts = [];

        $filterCategory = '';
        if ($this->category !== 'all') {
            $filterCategory = $this->category;
        }

        $favoritesFonts = GoogleFonts::getEnabledFonts();
        if (!empty($favoritesFonts)) {
            foreach ($fonts as &$font) {
                if (in_array($font['family'], $favoritesFonts)) {
                    $font['favorite'] = true;
                }
            }
        }

        if (!empty($this->search) || !empty($filterCategory)) {
            foreach ($fonts as $font) {

                $appendFont = false;
                $fontFamilyLower = mb_strtolower($font['family']);
                $searchLower = mb_strtolower($this->search);
                if (!empty($this->search)) {
                    if (strpos($fontFamilyLower, $searchLower) !== false) {
                        $appendFont = true;
                    }
                }
                if (!empty($filterCategory)) {
                   if (isset($font['category']) && $font['category'] == $filterCategory) {
                       $appendFont = true;
                   }
                   if ($filterCategory == 'favorites') {
                       if (isset($font['favorite']) && $font['favorite'] == true) {
                           $appendFont = true;
                       }
                   }
                   if (isset($font['subsets'])
                       && !empty($font['subsets'])
                       && is_array($font['subsets'])
                       && in_array($filterCategory, $font['subsets'])) {
                       $appendFont = true;
                   }
                }

               if ($appendFont) {
                    $filteredFonts[] = $font;
               }

            }
        } else {
            $filteredFonts = $fonts;
        }

        $fonts = $this->paginate($filteredFonts, 10);

        $this->dispatchBrowserEvent('font-picker-load-fonts',[
            'fonts' => $fonts->items()
        ]);

        return view('piksera-ui::livewire.modals.font-picker-modal', [
            'fonts' => $fonts
        ]);
    }

    public function category($category) {
        $this->category = $category;
        $this->gotoPage(1);
    }

    public function paginate($items, $perPage = 5, $page = null)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $total = count($items);
        $currentPage = $page;
        $offset = ($currentPage * $perPage) - $perPage ;
        $itemsToShow = array_slice($items , $offset , $perPage);

        return new LengthAwarePaginator($itemsToShow ,$total   ,$perPage);
    }

}
