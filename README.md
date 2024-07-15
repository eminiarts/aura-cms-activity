# Aura CMS Plugin: activity

[![Latest Version on Packagist](https://img.shields.io/packagist/v/aura/activity.svg?style=flat-square)](https://packagist.org/packages/aura/activity)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/aura/activity/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/aura/activity/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/aura/activity/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/aura/activity/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/aura/activity.svg?style=flat-square)](https://packagist.org/packages/aura/activity)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/activity.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/activity)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require aura/activity
```

Publish Spatie's Activitylog package and run the migrations:

```bash
php artisan vendor:publish --provider="Spatie\Activitylog\ActivitylogServiceProvider" --tag="activitylog-migrations"

php artisan migrate
```

Use this trait in your Resource to Log Activity:

```php
use Aura\Activity\LogActivity;

class News extends Resource
{
    use LogActivity;
// ...
}
```

Fields to be logged can be defined in the resource:

```php
[
    'name' => 'Aktivität',
    'type' => 'Aura\\Base\\Fields\\Tab',
    'validation' => '',
    'global' => true,
    'conditional_logic' => function () {
        return auth()->user()->isSuperAdmin();
    },
    'slug' => 'tab-activity',
],
[
    'name' => 'Aktivität',
    'type' => 'Aura\\Base\\Fields\\View',
    'validation' => '',
    'on_view' => true,
    'view' => 'activity::activity',

    'slug' => 'aktivitaet',
],

```


Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="activity-views"
```

## Usage

```php
$activity = new Aura\Activity();
echo $activity->echoPhrase('Hello, Aura!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Bajram Emini](https://github.com/eminiarts)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
