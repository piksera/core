<?php

namespace PikseraPackages\Offer\Http\Controllers\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use PikseraPackages\App\Http\Controllers\Controller;
use PikseraPackages\Offer\Http\Requests\OfferCreateUpdateRequest;

use PikseraPackages\Offer\Models\Offer;
use Illuminate\Http\Request;
use PikseraPackages\Product\Models\Product;

class OfferApiController extends Controller
{


    public function index()
    {
        $offers = Offer::getAll();

        return $offers;
    }

    public function getByProductId($productId = false)
    {
        if (!$productId) {
            return [];
        }

        $offers = Offer::getByProductId($productId);

        return $offers;
    }


    public function searchProducts(Request $request) {

        $keyword = $request->get('keyword', false);

        $options = [];
        $productsQuery = Product::query();
        if (!empty($keyword)) {
            $productsQuery->where('title', 'like', '%' . $keyword . '%');
        }
        $getProducts = $productsQuery->get();

        foreach ($getProducts as $product) {

            $all_prices = get_product_prices($product->id, true);
            $product_id = $product->id;

            if ($all_prices) {
                foreach ($all_prices as $a_price) {

                    if (!isset($a_price['values_plain'])) {
                        continue;
                    }

                    $options[] = [
                        'id' => $product_id . '|' . $a_price['id'],
                        'picture'=> get_picture($product->id),
                        'title' => $product->title . ' | '. currency_format($a_price['values_plain'])
                    ];

                }
            }
        }

        return $options;

    }
}