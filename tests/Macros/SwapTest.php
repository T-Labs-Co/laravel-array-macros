<?php

use Illuminate\Support\Arr;
use TLabsCo\ArrayMacros\Macros\Swap;

beforeEach(function () {
    // Register the macro
    Arr::macro('swap', app(Swap::class)());
});

it('swaps two keys in the array', function () {
    $array = ['a' => 1, 'b' => 2];
    $result = Arr::swap($array, 'a', 'b');

    expect($result)->toBe(['a' => 2, 'b' => 1]);
});

it('does nothing if one of the keys does not exist', function () {
    $array = ['a' => 1, 'b' => 2];
    $result = Arr::swap($array, 'a', 'c');

    expect($result)->toBe(['a' => 1, 'b' => 2]); // No swap occurs
});

it('does nothing if both keys do not exist', function () {
    $array = ['a' => 1, 'b' => 2];
    $result = Arr::swap($array, 'x', 'y');

    expect($result)->toBe(['a' => 1, 'b' => 2]); // No swap occurs
});

it('swaps keys with the same value', function () {
    $array = ['a' => 1, 'b' => 1];
    $result = Arr::swap($array, 'a', 'b');

    expect($result)->toBe(['a' => 1, 'b' => 1]); // Values remain the same
});

it('swaps keys in a larger array', function () {
    $array = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4];
    $result = Arr::swap($array, 'b', 'd');

    expect($result)->toBe(['a' => 1, 'b' => 4, 'c' => 3, 'd' => 2]);
});
