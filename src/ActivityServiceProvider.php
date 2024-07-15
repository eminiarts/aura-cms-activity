<?php

namespace Aura\Activity;

use Aura\Activity\Commands\ActivityCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ActivityServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {

        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('aura-cms-activity')
            ->hasViews();
    }
}
