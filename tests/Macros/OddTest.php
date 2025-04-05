<?php

use Illuminate\Support\Arr;
use TLabsCo\ArrayMacros\Macros\Odd;

beforeEach(function () {
    // Register the macro
    Arr::macro('odd', app(Odd::class)());
});

it('filters out only odd numbers in ascending order by default', function () {
    $array = [1, 2, 3, 4, 5, 6];
    $result = Arr::odd($array);

    expect($result)->toBe([1, 3, 5]); // Only odd numbers in ascending order
});

it('filters out only odd numbers in descending order', function () {
    $array = [1, 2, 3, 4, 5, 6];
    $result = Arr::odd($array, -1);

    expect($result)->toBe([5, 3, 1]); // Only odd numbers in descending order
});

it('filters out only odd numbers without sorting', function () {
    $array = [5, 1, 3, 2, 4, 6];
    $result = Arr::odd($array, 0);

    expect($result)->toBe([5, 1, 3]); // Only odd numbers in original order
});

it('returns an empty array if no odd numbers exist', function () {
    $array = [2, 4, 6, 8];
    $result = Arr::odd($array);

    expect($result)->toBe([]); // No odd numbers
});

it('handles an empty array and returns an empty result', function () {
    $array = [];
    $result = Arr::odd($array);

    expect($result)->toBe([]); // Empty input array
});
