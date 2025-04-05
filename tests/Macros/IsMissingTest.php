<?php

use Illuminate\Support\Arr;
use TLabsCo\ArrayMacros\Macros\IsMissing;

beforeEach(function () {
    // Register the macro
    Arr::macro('isMissing', app(IsMissing::class)());
});

it('returns true if the key is missing', function () {
    $array = ['a' => 1, 'b' => 2];
    $result = Arr::isMissing($array, 'c');

    expect($result)->toBeTrue();
});

it('returns false if the key exists', function () {
    $array = ['a' => 1, 'b' => 2];
    $result = Arr::isMissing($array, 'a');

    expect($result)->toBeFalse();
});

it('returns true if the key is missing in a nested array', function () {
    $array = ['a' => ['x' => 1], 'b' => 2];
    $result = Arr::isMissing($array, 'a.y');

    expect($result)->toBeTrue();
});

it('returns false if the key exists in a nested array', function () {
    $array = ['a' => ['x' => 1], 'b' => 2];
    $result = Arr::isMissing($array, 'a.x');

    expect($result)->toBeFalse();
});

it('returns true if the array is empty', function () {
    $array = [];
    $result = Arr::isMissing($array, 'a');

    expect($result)->toBeTrue();
});
