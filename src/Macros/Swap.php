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

final class Swap
{
    public function __invoke()
    {
        return function (array $array, $keyOne, $keyTwo): array {
            if (! Arr::has($array, [$keyOne, $keyTwo])) {
                return $array;
            }

            if (! Arr::isAssoc($array)) {

                $itemOneTmp = $array[$keyOne];
                $array[$keyOne] = $array[$keyTwo];
                $array[$keyTwo] = $itemOneTmp;

                return $array;
            }

            $updatedArray = [];

            foreach ($array as $key => $value) {
                if ($key === $keyOne) {
                    $updatedArray[$keyOne] = $array[$keyTwo];
                } elseif ($key === $keyTwo) {
                    $updatedArray[$keyTwo] = $array[$keyOne];
                } else {
                    $updatedArray[$key] = $value;
                }
            }

            return $updatedArray;
        };
    }
}
