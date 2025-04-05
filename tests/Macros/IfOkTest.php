<?php

use Illuminate\Support\Arr;
use TLabsCo\ArrayMacros\Macros\IfOk;

beforeEach(function () {
    // Register the macro
    Arr::macro('ifOk', app(IfOk::class)());
});

it('returns the array if the condition is true', function () {
    $array = [1, 2, 3];
    $result = Arr::ifOk($array, true);

    expect($result)->toBe($array);
});

it('returns null if the condition is false', function () {
    $array = [1, 2, 3];
    $result = Arr::ifOk($array, false);

    expect($result)->toBeNull();
});

it('returns the array if the condition is a callable that evaluates to true', function () {
    $array = [1, 2, 3];
    $result = Arr::ifOk($array, fn () => true);

    expect($result)->toBe($array);
});

it('returns null if the condition is a callable that evaluates to false', function () {
    $array = [1, 2, 3];
    $result = Arr::ifOk($array, fn () => false);

    expect($result)->toBeNull();
});

it('handles an empty array and returns it if the condition is true', function () {
    $array = [];
    $result = Arr::ifOk($array, true);

    expect($result)->toBe($array);
});
