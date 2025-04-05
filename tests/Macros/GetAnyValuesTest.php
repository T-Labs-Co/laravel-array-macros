<?php

use Illuminate\Support\Arr;
use TLabsCo\ArrayMacros\Macros\GetAnyValues;

beforeEach(function () {
    // Register the macro
    Arr::macro('getAnyValues', app(GetAnyValues::class)());
});

it('returns matching values from a flat array', function () {
    $array = ['a' => 1, 'b' => 2, 'c' => 3];
    $values = [2, 3, 4];

    $result = Arr::getAnyValues($array, $values);

    expect($result)->toBe([2, 3]); // Matching values
});

it('returns matching values from a nested array', function () {
    $array = ['a' => ['x' => 1], 'b' => ['y' => 2], 'c' => 3];
    $values = [1, 2, 4];

    $result = Arr::getAnyValues($array, $values);

    expect($result)->toBe([1, 2]); // Matching values
});

it('returns an empty array if no values match', function () {
    $array = ['a' => 1, 'b' => 2];
    $values = [3, 4];

    $result = Arr::getAnyValues($array, $values);

    expect($result)->toBe([]); // No matching values
});

it('handles an empty array and returns an empty result', function () {
    $array = [];
    $values = [1, 2];

    $result = Arr::getAnyValues($array, $values);

    expect($result)->toBe([]); // No matching values
});

it('handles an empty values array and returns an empty result', function () {
    $array = ['a' => 1, 'b' => 2];
    $values = [];

    $result = Arr::getAnyValues($array, $values);

    expect($result)->toBe([]); // No matching values
});
