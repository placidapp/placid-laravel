![Placid for Laravel - Automatic image creation from templates](https://placid.app/images/github-header-laravel.jpg)

# Placid for Laravel
[![Latest Version](https://img.shields.io/github/release/placidapp/placid-laravel.svg?style=flat-square)](https://github.com/placidapp/placid-laravel/releases)
[![Total Downloads](https://img.shields.io/packagist/dt/placidapp/placid-laravel.svg?style=flat-square)](https://packagist.org/packages/placidapp/placid-laravel)

This package enables you to automatically create images from [Placid](https://placid.app) templates. You can use the REST API or to create placid.app embed links with your variables to dynamically set the image content.

## About Placid
To use this package, you will need a [Placid](https://placid.app) account, where you can add, design and edit image templates.

It is a service that automatically creates share images for your content: Open Graph images (og:images), Twitter Card images and Pinterest images. This saves you hours to make your content shareable after publishing. We offer a bunch of nice preset designs you can use out of the box as well.

**More than share images:** With our editor you have full control over your templates, so you can use it for other types of images to add to your content as well (like teasers or blog graphics).

## Create a placid.app image URL
```php
$templateId = "qsraj";

$template = Placid::template($templateId)
$template
    ->elementText($title)
    ->text("I am a dynamic image");

$imageURL = $template->toPlacidUrl(); // - https://placid.app/u/qsraj?title=I%20am%20a%20dynamic%20Image%21

```
![Dynamically created image with Placid](https://placid.app/images/github-doku-animation_opt.gif)


## Generate an Image

Using the `image()` function on the template object will result in returning a [GeneratedImage Object](https://github.com/placidapp/placid-php/blob/master/src/GeneratedImage.php). When the image has been created, the webhook defined in your config will be called!

```php
 $image = $template->image();
```

`image(true)` will wait for the image to being finished: 
```php
 $image = $template->image(true); // - https://placid.app/u/qsraj?title=I%20am%20a%20dynamic%20Image%21
```

## Fields
You can add different elements onto your template that can be changed and filled dynamically.

### Text field
```php
$template
    ->elementText("text") // - Layer name in your template
    ->text("This is the text")
    ->color('#ff0022'); // - Text color as hex-code
```

**PLEASE NOTE:** The text color can only be changed when you use the `image()` function to generate an image, not if you use the URL API.

### Picture field
```php
$template
    ->elementPicture('picture') // - Layer name in your template
    ->imageFromUrl(
        "https://madewithvuejs.com/mandant/madewithvuejs/images/logo.png" // - image source
    );

$template
    ->elementPicture('picture') // - Layer name in your template
    ->imageFromWebsite("https://madewithvuejs.com"); // - URL of a page to screenshot
```

### Browserframe field
```php
$template
    ->elementBrowserframe('browserframe') // - Layer name in your template
    ->imageFromUrl(
        "https://madewithvuejs.com/mandant/madewithvuejs/images/logo.png" // - image source 
    )
    ->url("madewithvuejs.com"); // - URL that will be displayed in the browserframe's address bar

$template
    ->elementBrowserframe('browserframe') // - Layer name in your template
    ->imageFromWebsite("https://madewithvuejs.com") // - URL of a page to screenshot
    ->url("madewithvuejs.com"); // - URL that will be displayed in the browserframe's address bar
```

### Rectangle field
```php
$template
    ->elementRectangle('rectangle') // - Layer name in your template
    ->backgroundColor("#000000"); // - Background color as hex-code
```

**PLEASE NOTE:** The background color can only be changed when you use the `image()` function to generate an image, not if you use the URL API.


## Installation

You can install this package via composer using this command:

```bash
composer require "placidapp/placid-laravel:^1.0.0"
```

The package will automatically register itself.

You can publish the config-file with:

```bash
php artisan vendor:publish --provider="Placid\Laravel\PlacidLaravelServiceProvider" --tag="config"
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
     * Will be called when your created image is ready
     */
    'webhook_url' => null
];
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
