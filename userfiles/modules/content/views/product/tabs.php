<?php
$product = [];
$product['id'] = 0;
$productPrice = 0;
$contentData = \PikseraPackages\Product\Models\Product::$contentDataDefault;
$customFields = \PikseraPackages\Product\Models\Product::$customFields;

if ($data['id'] > 0) {
    $product = \PikseraPackages\Product\Models\Product::where('id',$data['id'])->first();
    $contentData = $product->getContentData();
    $productPrice = $product->price;
}
?>

<?php include_once __DIR__ .'/pricing.php'; ?>
<?php include_once __DIR__ .'/inventory.php'; ?>
<?php include_once __DIR__ .'/shipping.php'; ?>
<?php // include_once __DIR__ .'/variants.php'; ?>
