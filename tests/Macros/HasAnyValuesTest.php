<?php

use Illuminate\Support\Arr;
use TLabsCo\ArrayMacros\Macros\HasAnyValues;

beforeEach(function () {
    // Register the macro
    Arr::macro('hasAnyValues', app(HasAnyValues::class)());
});

it('returns true if any value exists in the array', function () {
    $array = ['a' => 1, 'b' => 2, 'c' => 3];
    $result = Arr::hasAnyValues($array, [2, 4]);

    expect($result)->toBeTrue();
});

it('returns false if no values exist in the array', function () {
    $array = ['a' => 1, 'b' => 2];
    $result = Arr::hasAnyValues($array, [3, 4]);

    expect($result)->toBeFalse();
});

it('returns true if the array contains at least one matching value', function () {
    $array = ['a' => 1, 'b' => 2, 'c' => 3];
    $result = Arr::hasAnyValues($array, [3]);

    expect($result)->toBeTrue();
});

it('returns false if the array is empty', function () {
    $array = [];
    $result = Arr::hasAnyValues($array, [1, 2]);

    expect($result)->toBeFalse();
});

it('returns false if the values array is empty', function () {
    $array = ['a' => 1, 'b' => 2];
    $result = Arr::hasAnyValues($array, []);

    expect($result)->toBeFalse(); // No values to check, so it should return false
});
