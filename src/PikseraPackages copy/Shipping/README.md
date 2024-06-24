# Shipping Manager

This package is responsible for managing shipping methods.

To add new Shipping Method, you need to create a new class that extends `PikseraPackages\Shipping\ShippingMethod` and implement the `cost` method.

```php
// In YourServiceProvider.php in register method add this
public function register()
    {
    $this->app->resolving(\PikseraPackages\Shipping\ShippingManager::class, function (\PikseraPackages\Shipping\ShippingManager $shippingManager) {
        $shippingManager->extend('pickup', function () {
            return new \PikseraPackages\Shipping\Providers\PickupDriver();
        });
    });
}
```
