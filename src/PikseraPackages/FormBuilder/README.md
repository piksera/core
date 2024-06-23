# Piksera Forms Builder

 
To add new element, you need to create a new class that implements `PikseraPackages\FormBuilder\Elements\ElementInterface` and implement the `render()` method.

```php
// In YourServiceProvider.php in register method add this
public function register()
    {
    $this->app->resolving(\PikseraPackages\FormBuilder\FormElementBuilder::class, 
    function (\PikseraPackages\FormBuilder\FormElementBuilder $formElementBuilder) {
        $formElementBuilder->extend('my-element', function () {
            return new \MyPackage\MyElement();
        });
    });
}
```


## Building form elements

```php

/**
* @var \PikseraPackages\FormBuilder\FormElementBuilder $formBuilder
*/
$formBuilder = app()->make(\PikseraPackages\FormBuilder\FormElementBuilder::class);
print $formBuilder->make('my-element', 'My Element')
```
