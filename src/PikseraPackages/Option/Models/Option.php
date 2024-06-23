<?php
namespace PikseraPackages\Option\Models;

use Illuminate\Database\Eloquent\Model;
use PikseraPackages\Core\Models\HasSearchableTrait;
use PikseraPackages\Database\Casts\ReplaceSiteUrlCast;
use PikseraPackages\Database\Traits\CacheableQueryBuilderTrait;
use PikseraPackages\Option\Events\OptionIsCreating;
use PikseraPackages\Option\Events\OptionIsUpdating;
use PikseraPackages\Option\Events\OptionWasCreated;
use PikseraPackages\Option\Events\OptionWasDeleted;
use PikseraPackages\Option\Events\OptionWasRetrieved;
use PikseraPackages\Option\Events\OptionWasUpdated;

class Option extends Model
{
    protected $fillable=['option_group','option_value'];
    public $cacheTagsToClear = ['global','content','frontend'];

    use CacheableQueryBuilderTrait;
    use HasSearchableTrait;

    protected $dispatchesEvents = [
        'retrieved' =>  OptionWasRetrieved::class,
        'creating'   => OptionIsCreating::class,
        'created'   => OptionWasCreated::class,
        'updating'   => OptionIsUpdating::class,
        'updated'   => OptionWasUpdated::class,
        'saved'   => OptionWasUpdated::class,
        'deleted'   => OptionWasDeleted::class,
    ];


    protected $casts = [
        'option_value' => ReplaceSiteUrlCast::class, //Casts like that: http://lorempixel.com/400/200/ =>  {SITE_URL}400/200/
    ];

    protected $searchable = [
        'id',
        'option_group',
        'option_value',
        'module',
        'is_system',
    ];

    public function getValue($key, $group = false)
    {
        if ($group) {
            $value = get_option($key, $group);
        } else {
            $value = get_option($key);
        }

        switch ($value) {
            case "y":
            case "yes":
                $value = true;
                break;
            case "n":
            case "no":
                $value = false;
                break;
        }

        if (is_numeric($value)) {
            $value = intval($value);
        }

        if (is_string($value)) {
            $value = trim($value);
        }

        return $value;
    }

    public function setValue($key, $value, $group = false)
    {
        $saveOption = [];
        $saveOption['option_key'] = $key;
        $saveOption['option_value'] = $value;

        if ($group) {
            $saveOption['option_group'] = $group;
        }

        return save_option($saveOption);
    }

    public static function fetchFromCollection($optionsCollection, $key)
    {
        if(empty($optionsCollection) || empty($key)) {
            return null;
        }

        return $optionsCollection->where('option_key', $key)->pluck('option_value')->first();
    }

}
