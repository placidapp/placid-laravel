# Placid for Laravel
[![Latest Version](https://img.shields.io/github/release/placidapp/placid-laravel.svg?style=flat-square)](https://github.com/placidapp/placid-laravel/releases)
[![Total Downloads](https://img.shields.io/packagist/dt/placidapp/placid-laravel.svg?style=flat-square)](https://packagist.org/packages/placidapp/placid-laravel)

This packages enables you to simply create Placid Images from Templates via using the REST Api or to easily create valid placid.app embed links!

## Create an Placid.app Image URL:
```php

$templateId = "qsraj";

$template = Placid::template($templateId)
$template
    ->elementText($title)
    ->text("I am a dynamic Image!");

$imageURL = $template->toPlacidUrl(); // - https://placid.app/u/qsraj?title=I%20am%20a%20dynamic%20Image%21

```
[![Latest Version](https://placid.app/u/qsraj?title=I%20am%20a%20dynamic%20Image%21)](https://placid.app/u/qsraj?title=I%20am%20a%20dynamic%20Image%21)


## Generate an Image:

Using the `image()` function on the  Template Object will result in returning a [GeneratedImage Object](https://github.com/placidapp/placid-php/blob/master/src/GeneratedImage.php)
When the image has been created, the (in your config) supplied webhook will be called!

```php
 $image = $template->image();
```

`image(true)` will wait for the image to being finished: 
```php
 $image = $template->image(true); // - https://placid.app/u/qsraj?title=I%20am%20a%20dynamic%20Image%21
```




## Installation

You can install this package via composer using this command:

```bash
composer require "placidapp/placid-laravel:^1.0.0"
```

The package will automatically register itself.

You can publish the config-file with:

```bash
php artisan vendor:publish --provider="Spatie\MediaLibrary\MediaLibraryServiceProvider" --tag="config"
```

These are the contents of the published config file:

```php
return [
    /**
     * Placid API Token
     */
    'api-token' => null,

    /**
     * Placid Success Webhook
     *
     * Will be called when your created Image is created
     */
    'webhook_url' => null
];
```


The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
