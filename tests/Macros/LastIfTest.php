<?php

use Illuminate\Support\Arr;
use TLabsCo\ArrayMacros\Macros\LastIf;

beforeEach(function () {
    // Register the macro
    Arr::macro('lastIf', app(LastIf::class)());
});

it('returns the last element if the condition is true', function () {
    $array = [1, 2, 3];
    $result = Arr::lastIf($array, true);

    expect($result)->toBe(3); // Last element
});

it('returns null if the condition is false', function () {
    $array = [1, 2, 3];
    $result = Arr::lastIf($array, false);

    expect($result)->toBeNull(); // Condition is false
});

it('returns the last element if the else condition is true', function () {
    $array = [1, 2, 3];
    $result = Arr::lastIf($array, false, true);

    expect($result)->toBe(3); // Else condition is true
});

it('returns null if both conditions are false', function () {
    $array = [1, 2, 3];
    $result = Arr::lastIf($array, false, false);

    expect($result)->toBeNull(); // Both conditions are false
});

it('returns null for an empty array regardless of conditions', function () {
    $array = [];
    $result = Arr::lastIf($array, true);

    expect($result)->toBeNull(); // Empty array
});
