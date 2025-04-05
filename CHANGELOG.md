# Changelog

All notable changes to `laravel-array-macros` will be documented in this file.

Contact T.Labs & Co [hongty.huynh@gmail.com](mailto:hongty.huynh@gmail.com)

## v1.0.0 - 2025-04-05

**Full Changelog**: https://github.com/T-Labs-Co/laravel-array-macros/commits/v1.0.0

## [1.0.0] - 2025-04-05

### Added

- Initial release of `laravel-array-macros`.
- Added macros:
  - `firstIf`: Returns the first element of an array if a condition is met.
  - `lastIf`: Returns the last element of an array if a condition is met.
  - `chunk`: Splits an array into chunks and applies a callback to each chunk.
  - `getAnyValues`: Retrieves the first matching value from an array based on a list of keys.
  - `hasAllValues`: Checks if all specified values exist in an array.
  - `hasAnyValues`: Checks if any of the specified values exist in an array.
  - `ifOk`: Returns the array if a condition is met, otherwise returns null.
  - `isMissing`: Checks if a key is missing from an array.
  - `missing`: Returns a list of keys that are missing from an array.
  - `range`: Creates a range of numbers with optional steps.
  - `renameKeys`: Renames keys in an array based on a mapping.
  - `swap`: Swaps the values of two keys in an array.
  - `validate`: Validates all items in an array using a rule or callable.
  - `isNumeric` macro to check if all items in an array are numeric, with support for strict mode.
  - `odd` macro to filter an array to include only odd numbers, with optional sorting.
  - `even` macro to filter an array to include only even numbers, with optional sorting.
  
