<?php

use Illuminate\Support\Arr;
use TLabsCo\ArrayMacros\Macros\Chunk;

beforeEach(function () {
    // Register the macro
    Arr::macro('chunk', app(Chunk::class)());
});

it('chunks an array and applies a callback to each chunk', function () {
    $array = [1, 2, 3, 4, 5, 6];
    $length = 2;

    $result = Arr::chunk($array, $length, function ($chunk) {
        return array_sum($chunk);
    });

    expect($result)->toBe([3, 7, 11]); // [1+2, 3+4, 5+6]
});

it('returns an empty array when the input array is empty', function () {
    $array = [];
    $length = 2;

    $result = Arr::chunk($array, $length, function ($chunk) {
        return array_sum($chunk);
    });

    expect($result)->toBe([]); // No chunks to process
});

it('handles arrays with a length not divisible by the chunk size', function () {
    $array = [1, 2, 3, 4, 5];
    $length = 2;

    $result = Arr::chunk($array, $length, function ($chunk) {
        return array_sum($chunk);
    });

    expect($result)->toBe([3, 7, 5]); // [1+2, 3+4, 5]
});
