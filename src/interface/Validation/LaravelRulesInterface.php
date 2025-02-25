<?php

namespace YukataRm\Laravel\Interface\Validation;

use YukataRm\Laravel\Interface\Validation\BaseRulesInterface;

/**
 * Laravel Validation Rules Interface
 *
 * @package YukataRm\Laravel\Interface\Validation
 */
interface LaravelRulesInterface extends BaseRulesInterface
{
    /*----------------------------------------*
     * Rule A
     *----------------------------------------*/

    /**
     * validate parameter is 1, true, “on”, “yes”
     *
     * @param string|null $message
     * @return static
     */
    public function accepted(string|null $message = null): static;

    /**
     * validate parameter is 1, true, “on”, “yes” if field is equal to value
     *
     * @param string $field
     * @param mixed $value
     * @param string|null $message
     * @return static
     */
    public function acceptedIf(string $field, mixed $value, string|null $message = null): static;

    /**
     * validate parameter is a valid URL
     *
     * @param string|null $message
     * @return static
     */
    public function activeUrl(string|null $message = null): static;

    /**
     * validate parameter is a value can be treated as a date and is later than date
     * date is either date to be compared or a parameter name
     *
     * @param string $date
     * @param string|null $message
     * @return static
     */
    public function after(string $date, string|null $message = null): static;

    /**
     * validate parameter is a value can be treated as a date and is later than or equal to date
     * date is either date to be compared or a parameter name
     *
     * @param string $date
     * @param string|null $message
     * @return static
     */
    public function afterOrEqual(string $date, string|null $message = null): static;

    /**
     * validate parameters consist of Unicode alphabetic characters
     * if isAscii is true, validate parameters consist of ASCII characters
     *
     * @param bool $isAscii
     * @param string|null $message
     * @return static
     */
    public function alpha(bool $isAscii = false, string|null $message = null): static;

    /**
     * validate parameters consist of Unicode alphabetic characters, numbers, underscores and hyphens
     * if isAscii is true, validate parameters consist of ASCII characters, numbers, underscores and hyphens
     *
     * @param bool $isAscii
     * @param string|null $message
     * @return static
     */
    public function alphaDash(bool $isAscii = false, string|null $message = null): static;

    /**
     * validate parameters consist of Unicode alphabetic characters and numbers
     * if isAscii is true, validate parameters consist of ASCII characters and numbers
     *
     * @param bool $isAscii
     * @param string|null $message
     * @return static
     */
    public function alphaNum(bool $isAscii = false, string|null $message = null): static;

    /**
     * validate parameter as an array
     * if acceptKeys is specified, validate parameter has specified keys
     *
     * @param array<string>|string $acceptKeys
     * @param string|null $message
     * @return static
     */
    public function array(array|string $acceptKeys = [], string|null $message = null): static;

    /**
     * validate parameter consist of ASCII characters
     *
     * @param string|null $message
     * @return static
     */
    public function ascii(string|null $message = null): static;

    /*----------------------------------------*
     * Rule B
     *----------------------------------------*/

    /**
     * if validation fails, stop validating the field
     *
     * @param string|null $message
     * @return static
     */
    public function bail(string|null $message = null): static;

    /**
     * validate parameter is a value can be treated as a date and is earlier than date
     * date is either date to be compared or a parameter name
     *
     * @param string $date
     * @param string|null $message
     * @return static
     */
    public function before(string $date, string|null $message = null): static;

    /**
     * validate parameter is a value can be treated as a date and is earlier than or equal to date
     * date is either date to be compared or a parameter name
     *
     * @param string $date
     * @param string|null $message
     * @return static
     */
    public function beforeOrEqual(string $date, string|null $message = null): static;

    /**
     * validate parameter is between min and max
     *
     * @param int $min
     * @param int $max
     * @param string|null $message
     * @return static
     */
    public function between(int $min, int $max, string|null $message = null): static;

    /**
     * validate parameter as a boolean value
     *
     * @param string|null $message
     * @return static
     */
    public function boolean(string|null $message = null): static;

    /*----------------------------------------*
     * Rule C
     *----------------------------------------*/

    /**
     * validate {field}_confirmation exists as a parameter and parameter matches it
     *
     * @param string|null $message
     * @return static
     */
    public function confirmed(string|null $message = null): static;

    /**
     * validate parameter contains values
     *
     * @param array<string|int>|string $values
     * @param string|null $message
     * @return static
     */
    public function contains(array|string $values, string|null $message = null): static;

    /**
     * validate parameter matches password of authenticated user
     *
     * @param string $guard
     * @param string|null $message
     * @return static
     */
    public function currentPassword(string $guard = "web", string|null $message = null): static;

    /*----------------------------------------*
     * Rule D
     *----------------------------------------*/

    /**
     * validate parameter as a date value
     *
     * @param string|null $message
     * @return static
     */
    public function date(string|null $message = null): static;

    /**
     * validate parameter is a value can be treated as a date and is equal to date
     *
     * @param string $date
     * @param string|null $message
     * @return static
     */
    public function dateEqual(string $date, string|null $message = null): static;

    /**
     * validate parameter as a date value and format it with specified format
     *
     * @param string $format
     * @param string|null $message
     * @return static
     */
    public function dateFormat(string $format, string|null $message = null): static;

    /**
     * validate parameter has a number of decimal places greater than or equal to min and less than or equal to max
     * if max is omitted, number of decimal places must be equal to min
     *
     * @param int $min
     * @param int|null $max
     * @param string|null $message
     * @return static
     */
    public function decimal(int $min, int|null $max = null, string|null $message = null): static;

    /**
     * validate parameter is 0, false, “off”, “no”
     *
     * @param string|null $message
     * @return static
     */
    public function declined(string|null $message = null): static;

    /**
     * validate parameter is 0, false, “off”, “no” if field is equal to value
     *
     * @param string $field
     * @param mixed $value
     * @param string|null $message
     * @return static
     */
    public function declinedIf(string $field, mixed $value, string|null $message = null): static;

    /**
     * validate parameter does not match value of field
     *
     * @param string $field
     * @param string|null $message
     * @return static
     */
    public function different(string $field, string|null $message = null): static;

    /**
     * validate parameter has a number of digits equal to value
     *
     * @param int $min
     * @param string|null $message
     * @return static
     */
    public function digits(int $min, string|null $message = null): static;

    /**
     * validate parameter has a number of digits greater than or equal to min and less than or equal to max
     *
     * @param int $min
     * @param int $max
     * @param string|null $message
     * @return static
     */
    public function digitsBetween(int $min, int $max, string|null $message = null): static;

    /**
     * validate parameter is a file and matches specified size
     *
     * @param int|null $width
     * @param int|null $height
     * @param int|null $minWidth
     * @param int|null $minHeight
     * @param int|null $maxWidth
     * @param int|null $maxHeight
     * @param float|string|null $ratio
     * @param string|null $message
     * @return static
     */
    public function dimensions(
        int|null $width = null,
        int|null $height = null,
        int|null $minWidth = null,
        int|null $minHeight = null,
        int|null $maxWidth = null,
        int|null $maxHeight = null,
        float|string|null $ratio = null,
        string|null $message = null,
    ): static;

    /**
     * validate parameter is an array and has no duplicate values
     *
     * @param bool $strict
     * @param bool $ignoreCase
     * @param string|null $message
     * @return static
     */
    public function distinct(bool $strict = false, bool $ignoreCase = false, string|null $message = null): static;

    /**
     * validate parameter does not start with any of values
     *
     * @param array<mixed>|string $values
     * @param string|null $message
     * @return static
     */
    public function doesntStartWith(array|string $values, string|null $message = null): static;

    /**
     * validate parameter does not end with any of values
     *
     * @param array<mixed>|string $values
     * @param string|null $message
     * @return static
     */
    public function doesntEndWith(array|string $values, string|null $message = null): static;

    /*----------------------------------------*
     * Rule E
     *----------------------------------------*/

    /**
     * validate parameter is an email address
     *
     * @param string|null $message
     * @return static
     */
    public function email(string|null $message = null): static;

    /**
     * validate parameter ends with one of values
     *
     * @param array<mixed>|string $values
     * @param string|null $message
     * @return static
     */
    public function endsWith(array|string $values, string|null $message = null): static;

    /**
     * validate parameter is a valid Enum value
     *
     * @param string $enum
     * @param \Closure|null $callback
     * @param string|null $message
     * @return static
     */
    public function enum(string $enum, \Closure|null $callback = null, string|null $message = null): static;

    /**
     * validate parameter is excluded from validate and validated method data
     *
     * @param string|null $message
     * @return static
     */
    public function exclude(string|null $message = null): static;

    /**
     * validate parameter is excluded from validate and validated method data if field is equal to value
     *
     * @param string $field
     * @param mixed $value
     * @param string|null $message
     * @return static
     */
    public function excludeIf(string $field, mixed $value, string|null $message = null): static;

    /**
     * validate parameter is excluded from validate and validated method data if field does not match value
     *
     * @param string $field
     * @param mixed $value
     * @param string|null $message
     * @return static
     */
    public function excludeUnless(string $field, mixed $value, string|null $message = null): static;

    /**
     * validate parameter is excluded from validate and validated method data if some of fields are present
     *
     * @param array<string>|string $fields
     * @param string|null $message
     * @return static
     */
    public function excludeWith(array|string $fields, string|null $message = null): static;

    /**
     * validate parameter is excluded from validate and validated method data if some of fields are not present
     *
     * @param string $field
     * @param string|null $message
     * @return static
     */
    public function excludeWithout(string $field, string|null $message = null): static;

    /**
     * validate parameter is present in column of table
     * if column is not specified, keyName is used instead
     *
     * @param string $table
     * @param string|null $column
     * @param \Closure|null $callback
     * @param string|null $message
     * @return static
     */
    public function exists(string $table, string|null $column = null, \Closure|null $callback = null, string|null $message = null): static;

    /**
     * validate parameter is a file and extension is one of those specified in extensions
     *
     * @param array<string>|string $extensions
     * @param string|null $message
     * @return static
     */
    public function extensions(array|string $extensions, string|null $message = null): static;

    /*----------------------------------------*
     * Rule F
     *----------------------------------------*/

    /**
     * validate parameter as a file
     *
     * @param string|null $message
     * @return static
     */
    public function file(string|null $message = null): static;

    /**
     * validate parameter is not empty if parameter is present
     *
     * @param string|null $message
     * @return static
     */
    public function filled(string|null $message = null): static;

    /*----------------------------------------*
     * Rule G
     *----------------------------------------*/

    /**
     * validate parameter is greater than value of field
     *
     * @param string $field
     * @param string|null $message
     * @return static
     */
    public function gt(string $field, string|null $message = null): static;

    /**
     * validate parameter is greater than or equal to value of field
     *
     * @param string $field
     * @param string|null $message
     * @return static
     */
    public function gte(string $field, string|null $message = null): static;

    /*----------------------------------------*
     * Rule H
     *----------------------------------------*/

    /**
     * validate parameter is a valid color code in hexadecimal format
     *
     * @param string|null $message
     * @return static
     */
    public function hexColor(string|null $message = null): static;

    /*----------------------------------------*
     * Rule I
     *----------------------------------------*/

    /**
     * validate parameter as an image
     *
     * @param string|null $message
     * @return static
     */
    public function image(string|null $message = null): static;

    /**
     * validate parameter is in values
     *
     * @param array<mixed>|string $values
     * @param string|null $message
     * @return static
     */
    public function in(array|string $values, string|null $message = null): static;

    /**
     * validate parameter is one of values field has
     *
     * @param string $field
     * @param string $key
     * @param string|null $message
     * @return static
     */
    public function inArray(string $field, string $key, string|null $message = null): static;

    /**
     * validate parameter is an integer
     *
     * @param string|null $message
     * @return static
     */
    public function integer(string|null $message = null): static;

    /**
     * validate parameter is a valid IP address
     *
     * @param string|null $message
     * @return static
     */
    public function ip(string|null $message = null): static;

    /**
     * validate parameter is an IPv4 address
     *
     * @param string|null $message
     * @return static
     */
    public function ipv4(string|null $message = null): static;

    /**
     * validate parameter is an IPv6 address
     *
     * @param string|null $message
     * @return static
     */
    public function ipv6(string|null $message = null): static;

    /*----------------------------------------*
     * Rule J
     *----------------------------------------*/

    /**
     * validate parameter is a JSON string
     *
     * @param string|null $message
     * @return static
     */
    public function json(string|null $message = null): static;

    /*----------------------------------------*
     * Rule L
     *----------------------------------------*/

    /**
     * validate parameter is less than value of field
     *
     * @param string $field
     * @param string|null $message
     * @return static
     */
    public function lt(string $field, string|null $message = null): static;

    /**
     * validate parameter is less than or equal to value of field
     *
     * @param string $field
     * @param string|null $message
     * @return static
     */
    public function lte(string $field, string|null $message = null): static;

    /**
     * validate parameters are lowercase
     *
     * @param string|null $message
     * @return static
     */
    public function lowercase(string|null $message = null): static;

    /**
     * validate parameter is list array
     *
     * @param string|null $message
     * @return static
     */
    public function list(string|null $message = null): static;

    /*----------------------------------------*
     * Rule M
     *----------------------------------------*/

    /**
     * validate parameter is a valid MAC address
     *
     * @param string|null $message
     * @return static
     */
    public function macAddress(string|null $message = null): static;

    /**
     * validate parameter is less than or equal to max
     *
     * @param int $max
     * @param string|null $message
     * @return static
     */
    public function max(int $max, string|null $message = null): static;

    /**
     * validate number of digits in parameter is less than or equal to max
     *
     * @param int $max
     * @param string|null $message
     * @return static
     */
    public function maxDigits(int $max, string|null $message = null): static;

    /**
     * validate parameter is a file, mime type corresponding to one of mimetypes specified in mimetypes
     *
     * @param array<string>|string $mimetypes
     * @param string|null $message
     * @return static
     */
    public function mimetypes(array|string $mimetypes, string|null $message = null): static;

    /**
     * validate parameter is a file, mime type corresponding to one of extensions specified in extensions
     *
     * @param array<string>|string $extensions
     * @param string|null $message
     * @return static
     */
    public function mimes(array|string $extensions, string|null $message = null): static;

    /**
     * validate parameter is greater than or equal to min
     *
     * @param int $min
     * @param string|null $message
     * @return static
     */
    public function min(int $min, string|null $message = null): static;

    /**
     * validate number of digits in parameter is greater than or equal to min
     *
     * @param int $min
     * @param string|null $message
     * @return static
     */
    public function minDigits(int $min, string|null $message = null): static;

    /**
     * validate parameter is a number multiple of num
     *
     * @param int $num
     * @param string|null $message
     * @return static
     */
    public function multipleOf(int $num, string|null $message = null): static;

    /**
     * validate parameter is not present
     *
     * @param string|null $message
     * @return static
     */
    public function missing(string|null $message = null): static;

    /**
     * validate parameter is not present if field matches value
     *
     * @param string $field
     * @param array<mixed> $values
     * @param string|null $message
     * @return static
     */
    public function missingIf(string $field, array $values, string|null $message = null): static;

    /**
     * validate parameter is not present if field does not match value
     *
     * @param string $field
     * @param array<mixed> $values
     * @param string|null $message
     * @return static
     */
    public function missingUnless(string $field, array $values, string|null $message = null): static;

    /**
     * validate parameter is not present if some of fields are present
     *
     * @param array<string>|string $fields
     * @param string|null $message
     * @return static
     */
    public function missingWith(array|string $fields, string|null $message = null): static;

    /**
     * validate parameter is not present if all of fields are present
     *
     * @param array<string>|string $fields
     * @param string|null $message
     * @return static
     */
    public function missingWithAll(array|string $fields, string|null $message = null): static;

    /*----------------------------------------*
     * Rule N
     *----------------------------------------*/

    /**
     * validate parameter is not in values
     *
     * @param array<mixed>|string $values
     * @param string|null $message
     * @return static
     */
    public function notIn(array|string $values, string|null $message = null): static;

    /**
     * validate parameter does not match regular expression pattern
     *
     * @param string $pattern
     * @param string|null $message
     * @return static
     */
    public function notRegex(string $pattern, string|null $message = null): static;

    /**
     * nullable parameter
     *
     * @param string|null $message
     * @return static
     */
    public function nullable(string|null $message = null): static;

    /**
     * validate parameter is numeric
     *
     * @param string|null $message
     * @return static
     */
    public function numeric(string|null $message = null): static;

    /*----------------------------------------*
     * Rule P
     *----------------------------------------*/

    /**
     * validate parameter is present
     *
     * @param string|null $message
     * @return static
     */
    public function present(string|null $message = null): static;

    /**
     * validate parameter is present if field is equal to value
     *
     * @param string $field
     * @param mixed $value
     * @param string|null $message
     * @return static
     */
    public function presentIf(string $field, mixed $value, string|null $message = null): static;

    /**
     * validate parameter is present if field does not match value
     *
     * @param string $field
     * @param mixed $value
     * @param string|null $message
     * @return static
     */
    public function presentUnless(string $field, mixed $value, string|null $message = null): static;

    /**
     * validate parameter is present if some of fields are present
     *
     * @param string $field
     * @param string|null $message
     * @return static
     */
    public function presentWith(string $field, string|null $message = null): static;

    /**
     * validate parameter is present if all of fields are present
     *
     * @param array<string>|string $fields
     * @param string|null $message
     * @return static
     */
    public function presentWithAll(array|string $fields, string|null $message = null): static;

    /**
     * validate parameter is not present, or is an empty
     *
     * @param string|null $message
     * @return static
     */
    public function prohibited(string|null $message = null): static;

    /**
     * validate parameter is not present, or is an empty if field matches value
     *
     * @param string $field
     * @param array<mixed> $values
     * @param string|null $message
     * @return static
     */
    public function prohibitedIf(string $field, array $values, string|null $message = null): static;

    /**
     * validate parameter is not present, or is an empty if field does not match value
     *
     * @param string $field
     * @param array<mixed> $values
     * @param string|null $message
     * @return static
     */
    public function prohibitedUnless(string $field, array $values, string|null $message = null): static;

    /**
     * validate all fields in fields are absent or empty if parameter is present and non-empty
     *
     * @param array<string>|string $fields
     * @param string|null $message
     * @return static
     */
    public function prohibits(array|string $fields, string|null $message = null): static;

    /*----------------------------------------*
     * Rule R
     *----------------------------------------*/

    /**
     * validate parameter matches regular expression pattern
     *
     * @param string $pattern
     * @param string|null $message
     * @return static
     */
    public function regex(string $pattern, string|null $message = null): static;

    /**
     * validate parameter is required
     *
     * @param string|null $message
     * @return static
     */
    public function required(string|null $message = null): static;

    /**
     * validate parameter is required if field is equal to value
     *
     * @param string $field
     * @param mixed $value
     * @param string|null $message
     * @return static
     */
    public function requiredIf(string $field, mixed $value, string|null $message = null): static;

    /**
     * validate parameter is required if field matches 1, true, “on”, “yes”
     *
     * @param array<string>|string $fields
     * @param string|null $message
     * @return static
     */
    public function requiredIfAccepted(array|string $fields, string|null $message = null): static;

    /**
     * validate parameter is required if field matches 0, false, “off”, “no”
     *
     * @param array<string>|string $fields
     * @param string|null $message
     * @return static
     */
    public function requiredIfDeclined(array|string $fields, string|null $message = null): static;

    /**
     * validate parameter is required if field does not match value
     *
     * @param string $field
     * @param mixed $value
     * @param string|null $message
     * @return static
     */
    public function requiredUnless(string $field, mixed $value, string|null $message = null): static;

    /**
     * validate parameter is required if some of fields are present
     *
     * @param array<string>|string $fields
     * @param string|null $message
     * @return static
     */
    public function requiredWith(array|string $fields, string|null $message = null): static;

    /**
     * validate parameter is required if all of fields are present
     *
     * @param array<string>|string $fields
     * @param string|null $message
     * @return static
     */
    public function requiredWithAll(array|string $fields, string|null $message = null): static;

    /**
     * validate parameter is required if some of fields are not present
     *
     * @param array<string>|string $fields
     * @param string|null $message
     * @return static
     */
    public function requiredWithout(array|string $fields, string|null $message = null): static;

    /**
     * validate parameter is required if all of fields are not present
     *
     * @param array<string>|string $fields
     * @param string|null $message
     * @return static
     */
    public function requiredWithoutAll(array|string $fields, string|null $message = null): static;

    /**
     * validate parameter as an array and validate parameter has specified keys
     *
     * @param array<string>|string $keys
     * @param string|null $message
     * @return static
     */
    public function requiredArrayKeys(array|string $keys, string|null $message = null): static;

    /*----------------------------------------*
     * Rule S
     *----------------------------------------*/

    /**
     * validate parameter matches value of field
     *
     * @param string $field
     * @param string|null $message
     * @return static
     */
    public function same(string $field, string|null $message = null): static;

    /**
     * validate parameter has a size of value
     *
     * @param int $size
     * @param string|null $message
     * @return static
     */
    public function size(int $size, string|null $message = null): static;

    /**
     * validate parameter starts with one of values
     *
     * @param array<mixed>|string $values
     * @param string|null $message
     * @return static
     */
    public function startsWith(array|string $values, string|null $message = null): static;

    /**
     * validate parameter is a string
     *
     * @param string|null $message
     * @return static
     */
    public function string(string|null $message = null): static;

    /*----------------------------------------*
     * Rule T
     *----------------------------------------*/

    /**
     * validate parameter is a valid time zone
     * if an identifier is specified, validate time zone is available in identifier
     *
     * @param array<string>|string $identifiers
     * @param string|null $message
     * @return static
     */
    public function timezone(array|string $identifiers = [], string|null $message = null): static;

    /*----------------------------------------*
     * Rule U
     *----------------------------------------*/

    /**
     * validate parameter is not present in column of table
     * if column is not specified, keyName is used instead
     *
     * @param string $table
     * @param string|null $column
     * @param \Closure|null $callback
     * @param string|null $message
     * @return static
     */
    public function unique(string $table, string|null $column = null, \Closure|null $callback = null, string|null $message = null): static;

    /**
     * validate parameters are uppercase
     *
     * @param string|null $message
     * @return static
     */
    public function uppercase(string|null $message = null): static;

    /**
     * validate parameter is a URL
     *
     * @param string|null $message
     * @return static
     */
    public function url(string|null $message = null): static;

    /**
     * validate parameter is a ULID
     *
     * @param string|null $message
     * @return static
     */
    public function ulid(string|null $message = null): static;

    /**
     * validate parameter is a UUID
     *
     * @param string|null $message
     * @return static
     */
    public function uuid(string|null $message = null): static;
}
