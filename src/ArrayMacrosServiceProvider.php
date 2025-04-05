<?php

/*
 * This file is a part of package t-co-labs/laravel-array-macros
 *
 * (c) T.Labs & Co.
 * Contact for Work: T. <hongty.huynh@gmail.com>
 *
 * Got a PHP or Laravel project? We're your go-to team! We can help you:
 *   - Architect the perfect solution for your specific needs.
 *   - Get cleaner, faster, and more efficient code.
 *   - Boost your app's performance through refactoring and optimization.
 *   - Build your project the right way with Laravel best practices.
 *   - Get expert guidance and support for all things Laravel.
 *   - Ensure high-quality code through thorough reviews.
 *   - Provide leadership for your team and manage your projects effectively.
 *   - Bring in a seasoned Technical Lead.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TLabsCo\ArrayMacros;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
            ->name('array-macros');
    }

    public function packageRegistered()
    {
        parent::packageRegistered();

        Collection::make($this->macros())
            ->reject(fn ($class, $macro) => Arr::hasMacro($macro))
            ->each(fn ($class, $macro) => Arr::macro($macro, app($class)()));
    }

    private function macros()
    {
        return [
            'chunk' => \TLabsCo\ArrayMacros\Macros\Chunk::class,
            'even' => \TLabsCo\ArrayMacros\Macros\Even::class,
            'firstIf' => \TLabsCo\ArrayMacros\Macros\FirstIf::class,
            'getAnyValues' => \TLabsCo\ArrayMacros\Macros\GetAnyValues::class,
            'hasAllValues' => \TLabsCo\ArrayMacros\Macros\HasAllValues::class,
            'hasAnyValues' => \TLabsCo\ArrayMacros\Macros\HasAnyValues::class,
            'if' => \TLabsCo\ArrayMacros\Macros\IfOk::class,
            'isMissing' => \TLabsCo\ArrayMacros\Macros\IsMissing::class,
            'isNumeric' => \TLabsCo\ArrayMacros\Macros\IsNumeric::class,
            'missing' => \TLabsCo\ArrayMacros\Macros\Missing::class,
            'odd' => \TLabsCo\ArrayMacros\Macros\Odd::class,
            'range' => \TLabsCo\ArrayMacros\Macros\Range::class,
            'renameKeys' => \TLabsCo\ArrayMacros\Macros\RenameKeys::class,
            'swap' => \TLabsCo\ArrayMacros\Macros\Swap::class,
            'validate' => \TLabsCo\ArrayMacros\Macros\Validate::class,
        ];
    }
}
