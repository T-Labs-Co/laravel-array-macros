<?php

use Illuminate\Support\Arr;
use TLabsCo\ArrayMacros\Macros\RenameKeys;

beforeEach(function () {
    // Register the macro
    Arr::macro('renameKeys', app(RenameKeys::class)());
});

it('renames keys in the array', function () {
    $array = ['a' => 1, 'b' => 2];
    $result = Arr::renameKeys($array, ['a' => 'x', 'b' => 'y']);

    expect($result)->toBe(['x' => 1, 'y' => 2]);
});

it('keeps keys unchanged if no mapping is provided', function () {
    $array = ['a' => 1, 'b' => 2];
    $result = Arr::renameKeys($array, []);

    expect($result)->toBe(['a' => 1, 'b' => 2]); // No keys renamed
});

it('renames only the keys that exist in the mapping', function () {
    $array = ['a' => 1, 'b' => 2, 'c' => 3];
    $result = Arr::renameKeys($array, ['a' => 'x', 'c' => 'z']);

    expect($result)->toBe(['x' => 1, 'b' => 2, 'z' => 3]); // Only 'a' and 'c' renamed
});

it('handles arrays with nested keys', function () {
    $array = ['a' => ['x' => 1], 'b' => 2];
    $result = Arr::renameKeys($array, ['a' => 'alpha', 'b' => 'beta']);

    expect($result)->toBe(['alpha' => ['x' => 1], 'beta' => 2]); // Top-level keys renamed
});

it('does not rename keys that are not in the array', function () {
    $array = ['a' => 1, 'b' => 2];
    $result = Arr::renameKeys($array, ['x' => 'y']);

    expect($result)->toBe(['a' => 1, 'b' => 2]); // No keys renamed
});
