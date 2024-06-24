<?php
namespace PikseraPackages\Product\Models;

/**
 * @deprecated
 */


use PikseraPackages\CustomField\Models\CustomField;
use PikseraPackages\Product\Scopes\PriceScope;

class ProductPrice extends CustomField
{
    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new PriceScope());
    }

    public function save(array $options = [])
    {
        $this->rel_type = 'content';
        $this->type = 'price';

       return parent::save($options);
    }
}
