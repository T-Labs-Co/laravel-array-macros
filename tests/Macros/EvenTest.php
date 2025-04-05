<?php

use Illuminate\Support\Arr;
use TLabsCo\ArrayMacros\Macros\Even;

beforeEach(function () {
    // Register the macro
    Arr::macro('even', app(Even::class)());
});

it('filters out only even numbers in ascending order by default', function () {
    $array = [1, 2, 3, 4, 5, 6];
    $result = Arr::even($array);

    expect($result)->toBe([2, 4, 6]); // Only even numbers in ascending order
});

it('filters out only even numbers in descending order', function () {
    $array = [1, 2, 3, 4, 5, 6];
    $result = Arr::even($array, -1);

    expect($result)->toBe([6, 4, 2]); // Only even numbers in descending order
});

it('filters out only even numbers without sorting', function () {
    $array = [6, 1, 4, 3, 2, 5];
    $result = Arr::even($array, 0);

    expect($result)->toBe([6, 4, 2]); // Only even numbers in original order
});

it('returns an empty array if no even numbers exist', function () {
    $array = [1, 3, 5, 7];
    $result = Arr::even($array);

    expect($result)->toBe([]); // No even numbers
});

it('handles an empty array and returns an empty result', function () {
    $array = [];
    $result = Arr::even($array);

    expect($result)->toBe([]); // Empty input array
});
