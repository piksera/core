<?php
namespace PikseraPackages\Product\Models;

/**
 * @deprecated
 */

use PikseraPackages\CustomField\Models\CustomField;
use PikseraPackages\Product\Scopes\SpecialPriceScope;

class ProductSpecialPrice extends CustomField
{
    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new SpecialPriceScope());
    }

    public function save(array $options = [])
    {

        $this->rel_type = 'content';
        $this->type = 'price';
        $this->name = 'special_price';
        $this->name_key = 'special_price';

        return parent::save($options);
    }
}