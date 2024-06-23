<?php
$productVariant = [];
$productVariant['id'] = 0;
$productVariantPrice = 0;
$contentData = \PikseraPackages\Product\Models\ProductVariant::$contentDataDefault;
$customFields = \PikseraPackages\Product\Models\ProductVariant::$customFields;

if ($data['id'] > 0) {
    $productVariant = \PikseraPackages\Product\Models\ProductVariant::where('id',$data['id'])->first();
    $contentData = $productVariant->getContentData();
    $productVariantPrice = $productVariant->price;
}
?>
