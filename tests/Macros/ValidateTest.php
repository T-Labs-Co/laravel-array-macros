<?php

use Illuminate\Support\Arr;
use TLabsCo\ArrayMacros\Macros\Validate;

beforeEach(function () {
    // Register the macro
    Arr::macro('validate', app(Validate::class)());
});

it('validates all items in the array using a string rule', function () {
    $array = [1, 2, 3];
    $result = Arr::validate($array, 'integer');

    expect($result)->toBeTrue();
});

it('returns false if any item fails validation using a string rule', function () {
    $array = [1, 'two', 3];
    $result = Arr::validate($array, 'integer');

    expect($result)->toBeFalse();
});

it('validates all items in the array using an array rule', function () {
    $array = [['value' => 1], ['value' => 2]];
    $result = Arr::validate($array, ['value' => 'integer']);

    expect($result)->toBeTrue();
});

it('returns false if any item fails validation using an array rule', function () {
    $array = [['value' => 1], ['value' => 'two']];
    $result = Arr::validate($array, ['value' => 'integer']);

    expect($result)->toBeFalse();
});

it('validates all items in the array using a callable', function () {
    $array = [2, 4, 6];
    $result = Arr::validate($array, fn ($item) => $item % 2 === 0);

    expect($result)->toBeTrue();
});

it('returns false if any item fails validation using a callable', function () {
    $array = [2, 3, 6];
    $result = Arr::validate($array, fn ($item) => $item % 2 === 0);

    expect($result)->toBeFalse();
});

it('validates nested arrays with a string rule', function () {
    $array = [['value' => 1], ['value' => 2]];
    $result = Arr::validate($array, ['value' => 'integer']);

    expect($result)->toBeTrue();
});

it('returns false if validation rule is not met for nested arrays', function () {
    $array = [['value' => 1], ['value' => 'invalid']];
    $result = Arr::validate($array, ['value' => 'integer']);

    expect($result)->toBeFalse();
});

it('handles an empty array and returns true', function () {
    $array = [];
    $result = Arr::validate($array, 'integer');

    expect($result)->toBeTrue();
});
