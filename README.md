# Aura CMS Plugin: activity

[![Latest Version on Packagist](https://img.shields.io/packagist/v/eminiarts/aura-cms-activity.svg?style=flat-square)](https://packagist.org/packages/eminiarts/aura-cms-activity)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/eminiarts/aura-cms-activity/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/eminiarts/aura-cms-activity/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/eminiarts/aura-cms-activity/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/eminiarts/aura-cms-activity/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/eminiarts/aura-cms-activity.svg?style=flat-square)](https://packagist.org/packages/eminiarts/aura-cms-activity)

This Package is a Plugin for the Aura CMS. It logs activities of the resources using [spatie's activitylog package](https://github.com/spatie/laravel-activitylog).


## Installation

You can install the package via composer:

```bash
composer require eminiarts/aura-cms-activity
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
    'view' => 'aura-cms-activity::activity',

    'slug' => 'aktivitaet',
],

```


Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="aura-cms-activity-views"
```


## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.


## Credits

- [Bajram Emini](https://github.com/eminiarts)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
