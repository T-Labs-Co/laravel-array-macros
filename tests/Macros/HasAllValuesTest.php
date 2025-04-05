<?php

use Illuminate\Support\Arr;
use TLabsCo\ArrayMacros\Macros\HasAllValues;

beforeEach(function () {
    // Register the macro
    Arr::macro('hasAllValues', app(HasAllValues::class)());
});

it('returns true if all values exist in the array', function () {
    $array = ['a' => 1, 'b' => 2, 'c' => 3];
    $result = Arr::hasAllValues($array, [1, 2]);

    expect($result)->toBeTrue();
});

it('returns false if any value is missing', function () {
    $array = ['a' => 1, 'b' => 2];
    $result = Arr::hasAllValues($array, [1, 3]);

    expect($result)->toBeFalse();
});

it('returns true if the array contains all values, even with duplicates', function () {
    $array = ['a' => 1, 'b' => 2, 'c' => 1];
    $result = Arr::hasAllValues($array, [1, 2]);

    expect($result)->toBeTrue();
});

it('returns false if the array is empty', function () {
    $array = [];
    $result = Arr::hasAllValues($array, [1, 2]);

    expect($result)->toBeFalse();
});

it('returns true if the values array is empty', function () {
    $array = ['a' => 1, 'b' => 2];
    $result = Arr::hasAllValues($array, []);

    expect($result)->toBeTrue(); // No values to check, so it should return true
});
