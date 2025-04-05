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
 *  Returns array with only even number
 */
final class Even
{
    public function __invoke()
    {
        /**
         * Returns array with only even number
         *
         * @param  array  $array
         * @param  int  $sort  1 - asc, -1 desc, 0 - no sort
         */
        return function (array $array, $sort = 1): array {
            if (empty($array)) {
                return [];
            }

            $filter = array_values(array_filter($array, fn ($item) => $item % 2 === 0));

            if ($sort === -1) {
                rsort($filter);
            } elseif ($sort === 1) {
                sort($filter);
            }

            return $filter;
        };
    }
}
