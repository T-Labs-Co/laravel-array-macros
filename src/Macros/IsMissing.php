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

namespace TLabsCo\ArrayMacros\Macros;

use Illuminate\Support\Arr;

/**
 * Checks if keys are missing from the original array
 */
final class IsMissing
{
    public function __invoke()
    {
        /**
         * Checks if keys are missing from the original array
         */
        return function (array $array, array|string $keys): bool {
            $array = Arr::dot($array);
            $missings = array_values(array_flip(array_diff_key(array_flip((array) $keys), $array)));

            return ! empty($missings);
        };
    }
}
