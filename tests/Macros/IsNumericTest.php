<?php

use Illuminate\Support\Arr;
use TLabsCo\ArrayMacros\Macros\IsNumeric;

beforeEach(function () {
    // Register the macro
    Arr::macro('isNumeric', app(IsNumeric::class)());
});

it('returns true if all items are numeric (non-strict)', function () {
    $array = [1, '2', 3.5, '4.0'];
    $result = Arr::isNumeric($array);

    expect($result)->toBeTrue(); // All items are numeric
});

it('returns false if any item is not numeric (non-strict)', function () {
    $array = [1, '2', 'three', 4];
    $result = Arr::isNumeric($array);

    expect($result)->toBeFalse(); // 'three' is not numeric
});

it('returns true if all items are numeric (strict)', function () {
    $array = [1, 2.5, 3];
    $result = Arr::isNumeric($array, true);

    expect($result)->toBeTrue(); // All items are strictly numeric
});

it('returns false if any item is not strictly numeric', function () {
    $array = [1, '2', 3.5];
    $result = Arr::isNumeric($array, true);

    expect($result)->toBeFalse(); // '2' is a string, not strictly numeric
});

it('returns false for an empty array', function () {
    $array = [];
    $result = Arr::isNumeric($array);

    expect($result)->toBeFalse(); // Empty array is not considered numeric
});
