<?php

use Illuminate\Support\Arr;
use TLabsCo\ArrayMacros\Macros\Range;

beforeEach(function () {
    // Register the macro
    Arr::macro('range', app(Range::class)());
});

it('creates a range of numbers', function () {
    $result = Arr::range(1, 5);

    expect($result)->toBe([1, 2, 3, 4, 5]);
});

it('creates a range with a step', function () {
    $result = Arr::range(1, 10, 2);

    expect($result)->toBe([1, 3, 5, 7, 9]); // Step of 2
});

it('creates a descending range', function () {
    $result = Arr::range(5, 1);

    expect($result)->toBe([5, 4, 3, 2, 1]); // Descending order
});

it('creates a descending range with a step', function () {
    $result = Arr::range(10, 1, 2);

    expect($result)->toBe([10, 8, 6, 4, 2]); // Descending with step of 2
});

it('returns an empty array if the range is invalid', function () {
    $result = Arr::range(5, 5);

    expect($result)->toBe([]); // Start and end are the same, no range
});
