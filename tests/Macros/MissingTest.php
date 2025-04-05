<?php

use Illuminate\Support\Arr;
use TLabsCo\ArrayMacros\Macros\Missing;

beforeEach(function () {
    // Register the macro
    Arr::macro('missing', app(Missing::class)());
});

it('returns the missing keys from the array', function () {
    $array = ['a' => 1, 'b' => 2];
    $result = Arr::missing($array, ['b', 'c']);

    expect($result)->toBe(['c']); // 'c' is missing
});

it('returns an empty array if no keys are missing', function () {
    $array = ['a' => 1, 'b' => 2];
    $result = Arr::missing($array, ['a', 'b']);

    expect($result)->toBe([]); // No keys are missing
});

it('returns all keys if the array is empty', function () {
    $array = [];
    $result = Arr::missing($array, ['a', 'b']);

    expect($result)->toBe(['a', 'b']); // All keys are missing
});

it('handles nested keys and returns missing ones', function () {
    $array = ['a' => ['x' => 1], 'b' => 2];
    $result = Arr::missing($array, ['a.x', 'a.y', 'b']);

    expect($result)->toBe(['a.y']); // 'a.y' is missing
});

it('returns an empty array if the keys array is empty', function () {
    $array = ['a' => 1, 'b' => 2];
    $result = Arr::missing($array, []);

    expect($result)->toBe([]); // No keys to check, so no missing keys
});
