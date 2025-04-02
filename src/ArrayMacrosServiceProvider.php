<?php

namespace TLabsCo\ArrayMacros;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use TLabsCo\ArrayMacros\Commands\ArrayMacrosCommand;

class ArrayMacrosServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-array-macros')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_array_macros_table')
            ->hasCommand(ArrayMacrosCommand::class);
    }
}
