<?php
/*
 * This file is part of the Microweber framework.
 *
 * (c) Microweber CMS LTD
 *
 * For full license information see
 * https://github.com/piksera/core/blob/master/LICENSE
 *
 */
namespace PikseraPackages\Database;

use Illuminate\Database\Eloquent\Model as Eloquent;
use PikseraPackages\Database\Observers\BaseModelObserver;

class BaseModel extends Eloquent
{

    protected $guarded = array();
    public $relationships = array();
    protected $rules = array();
    private $validator;

    public function validateAndFill($data)
    {
        $this->validator = \Validator::make($data, $this->rules);
        if ($this->validator->fails()) {
            return false;
        }
        $this->fill($data);

        return true;
    }

    protected static function ___boot() // TODO
    {
        static::observe(new BaseModelObserver());
        parent::boot();
    }
}
