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

/**
 *  Returns true if all items is numeric
 */
final class IsNumeric
{
    public function __invoke()
    {
        /**
         * Returns true if all items is numeric
         *
         * @param  array  $array
         * @param  bool  $strict
         */
        return function (array $array, $strict = false): bool {
            if (empty($array)) {
                return false;
            }

            if ($strict) {
                // all numeric
                $filter = array_filter($array, function ($item) {
                    /** @phpstan-ignore-next-line  */
                    return is_int($item) || is_float($item) || is_float($item);
                });

                return count($filter) === count($array);
            }

            return count($array) === count(array_filter($array, 'is_numeric'));

        };
    }
}
