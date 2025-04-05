<?php

use Illuminate\Support\Arr;
use TLabsCo\ArrayMacros\Macros\FirstIf;

beforeEach(function () {
    // Register the macro
    Arr::macro('firstIf', app(FirstIf::class)());
});

it('returns the first element if the condition is true', function () {
    $array = [1, 2, 3];
    $result = Arr::firstIf($array, true);

    expect($result)->toBe(1);
});

it('returns null if the condition is false', function () {
    $array = [1, 2, 3];
    $result = Arr::firstIf($array, false);

    expect($result)->toBeNull();
});

it('returns the first element if the else condition is true', function () {
    $array = [1, 2, 3];
    $result = Arr::firstIf($array, false, true);

    expect($result)->toBe(1);
});

it('returns null if both conditions are false', function () {
    $array = [1, 2, 3];
    $result = Arr::firstIf($array, false, false);

    expect($result)->toBeNull();
});
