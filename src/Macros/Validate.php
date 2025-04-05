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

use Illuminate\Support\Facades\Validator;

/**
 * Returns true if $callback returns true for every item. If $callback
 * is a string or an array, regard it as a validation rule.
 *
 * @param  string|array|callable  $callback
 */
final class Validate
{
    public function __invoke()
    {
        return function (array $array, string|array|callable $callback): mixed {

            if (is_string($callback) || is_array($callback)) {

                $validationRule = $callback;

                $callback = function ($item) use ($validationRule) {
                    if (! is_array($item)) {
                        $item = ['default' => $item];
                    }

                    if (! is_array($validationRule)) {
                        $validationRule = ['default' => $validationRule];
                    }

                    return Validator::make($item, $validationRule)->passes();
                };
            }

            foreach ($array as $item) {
                if (! $callback($item)) {
                    return false;
                }
            }

            return true;
        };
    }
}
