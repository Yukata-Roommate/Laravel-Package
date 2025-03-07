<?php

namespace YukataRm\Laravel\Validation;

use YukataRm\Laravel\Interface\Validation\LaravelRulesInterface;
use YukataRm\Laravel\Validation\BaseRules;

use Illuminate\Validation\Rule;

/**
 * Laravel Validation Rules
 *
 * @package YukataRm\Laravel\Validation
 */
abstract class LaravelRules extends BaseRules implements LaravelRulesInterface
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
    public function accepted(string|null $message = null): static
    {
        return $this->add("accepted", $message);
    }

    /**
     * validate parameter is 1, true, “on”, “yes” if field is equal to value
     *
     * @param string $field
     * @param mixed $value
     * @param string|null $message
     * @return static
     */
    public function acceptedIf(string $field, mixed $value, string|null $message = null): static
    {
        return $this->add("accepted_if", $message, [$field, $value]);
    }

    /**
     * validate parameter is a valid URL
     *
     * @param string|null $message
     * @return static
     */
    public function activeUrl(string|null $message = null): static
    {
        return $this->add("active_url", $message);
    }

    /**
     * validate parameter is a value can be treated as a date and is later than date
     * date is either date to be compared or a parameter name
     *
     * @param string $date
     * @param string|null $message
     * @return static
     */
    public function after(string $date, string|null $message = null): static
    {
        return $this->add("after", $message, $date);
    }

    /**
     * validate parameter is a value can be treated as a date and is later than or equal to date
     * date is either date to be compared or a parameter name
     *
     * @param string $date
     * @param string|null $message
     * @return static
     */
    public function afterOrEqual(string $date, string|null $message = null): static
    {
        return $this->add("after_or_equal", $message, $date);
    }

    /**
     * validate parameters consist of Unicode alphabetic characters
     * if isAscii is true, validate parameters consist of ASCII characters
     *
     * @param bool $isAscii
     * @param string|null $message
     * @return static
     */
    public function alpha(bool $isAscii = false, string|null $message = null): static
    {
        $values = $isAscii ? ["ascii"] : [];

        return $this->add("alpha", $message, $values);
    }

    /**
     * validate parameters consist of Unicode alphabetic characters, numbers, underscores and hyphens
     * if isAscii is true, validate parameters consist of ASCII characters, numbers, underscores and hyphens
     *
     * @param bool $isAscii
     * @param string|null $message
     * @return static
     */
    public function alphaDash(bool $isAscii = false, string|null $message = null): static
    {
        $values = $isAscii ? ["ascii"] : [];

        return $this->add("alpha_dash", $message, $values);
    }

    /**
     * validate parameters consist of Unicode alphabetic characters and numbers
     * if isAscii is true, validate parameters consist of ASCII characters and numbers
     *
     * @param bool $isAscii
     * @param string|null $message
     * @return static
     */
    public function alphaNum(bool $isAscii = false, string|null $message = null): static
    {
        $values = $isAscii ? ["ascii"] : [];

        return $this->add("alpha_num", $message, $values);
    }

    /**
     * validate parameter as an array
     * if acceptKeys is specified, validate parameter has specified keys
     *
     * @param array<string>|string $acceptKeys
     * @param string|null $message
     * @return static
     */
    public function array(array|string $acceptKeys = [], string|null $message = null): static
    {
        return $this->add("array", $message, $acceptKeys);
    }

    /**
     * validate parameter consist of ASCII characters
     *
     * @param string|null $message
     * @return static
     */
    public function ascii(string|null $message = null): static
    {
        return $this->add("ascii", $message);
    }

    /*----------------------------------------*
     * Rule B
     *----------------------------------------*/

    /**
     * if validation fails, stop validating the field
     *
     * @param string|null $message
     * @return static
     */
    public function bail(string|null $message = null): static
    {
        return $this->add("bail", $message);
    }

    /**
     * validate parameter is a value can be treated as a date and is earlier than date
     * date is either date to be compared or a parameter name
     *
     * @param string $date
     * @param string|null $message
     * @return static
     */
    public function before(string $date, string|null $message = null): static
    {
        return $this->add("before", $message, $date);
    }

    /**
     * validate parameter is a value can be treated as a date and is earlier than or equal to date
     * date is either date to be compared or a parameter name
     *
     * @param string $date
     * @param string|null $message
     * @return static
     */
    public function beforeOrEqual(string $date, string|null $message = null): static
    {
        return $this->add("before_or_equal", $message, $date);
    }

    /**
     * validate parameter is between min and max
     *
     * @param int $min
     * @param int $max
     * @param string|null $message
     * @return static
     */
    public function between(int $min, int $max, string|null $message = null): static
    {
        return $this->add("between", $message, [$min, $max]);
    }

    /**
     * validate parameter as a boolean value
     *
     * @param string|null $message
     * @return static
     */
    public function boolean(string|null $message = null): static
    {
        return $this->add("boolean", $message);
    }

    /*----------------------------------------*
     * Rule C
     *----------------------------------------*/

    /**
     * validate {field}_confirmation exists as a parameter and parameter matches it
     *
     * @param string|null $message
     * @return static
     */
    public function confirmed(string|null $message = null): static
    {
        return $this->add("confirmed", $message);
    }

    /**
     * validate parameter contains values
     *
     * @param array<string|int>|string $values
     * @param string|null $message
     * @return static
     */
    public function contains(array|string $values, string|null $message = null): static
    {
        return $this->add("contains", $message, $values);
    }

    /**
     * validate parameter matches password of authenticated user
     *
     * @param string $guard
     * @param string|null $message
     * @return static
     */
    public function currentPassword(string $guard = "web", string|null $message = null): static
    {
        return $this->add("current_password", $message, $guard);
    }

    /*----------------------------------------*
     * Rule D
     *----------------------------------------*/

    /**
     * validate parameter as a date value
     *
     * @param string|null $message
     * @return static
     */
    public function date(string|null $message = null): static
    {
        return $this->add("date", $message);
    }

    /**
     * validate parameter is a value can be treated as a date and is equal to date
     *
     * @param string $date
     * @param string|null $message
     * @return static
     */
    public function dateEqual(string $date, string|null $message = null): static
    {
        return $this->add("date_equals", $message, $date);
    }

    /**
     * validate parameter as a date value and format it with specified format
     *
     * @param string $format
     * @param string|null $message
     * @return static
     */
    public function dateFormat(string $format, string|null $message = null): static
    {
        return $this->add("date_format", $message, $format);
    }

    /**
     * validate parameter has a number of decimal places greater than or equal to min and less than or equal to max
     * if max is omitted, number of decimal places must be equal to min
     *
     * @param int $min
     * @param int|null $max
     * @param string|null $message
     * @return static
     */
    public function decimal(int $min, int|null $max = null, string|null $message = null): static
    {
        $values = is_null($max) ? $min : [$min, $max];

        return $this->add("decimal", $message, $values);
    }

    /**
     * validate parameter is 0, false, “off”, “no”
     *
     * @param string|null $message
     * @return static
     */
    public function declined(string|null $message = null): static
    {
        return $this->add("declined", $message);
    }

    /**
     * validate parameter is 0, false, “off”, “no” if field is equal to value
     *
     * @param string $field
     * @param mixed $value
     * @param string|null $message
     * @return static
     */
    public function declinedIf(string $field, mixed $value, string|null $message = null): static
    {
        return $this->add("declined_if", $message, [$field, $value]);
    }

    /**
     * validate parameter does not match value of field
     *
     * @param string $field
     * @param string|null $message
     * @return static
     */
    public function different(string $field, string|null $message = null): static
    {
        return $this->add("different", $message, $field);
    }

    /**
     * validate parameter has a number of digits equal to value
     *
     * @param int $min
     * @param string|null $message
     * @return static
     */
    public function digits(int $min, string|null $message = null): static
    {
        return $this->add("digits", $message, $min);
    }

    /**
     * validate parameter has a number of digits greater than or equal to min and less than or equal to max
     *
     * @param int $min
     * @param int $max
     * @param string|null $message
     * @return static
     */
    public function digitsBetween(int $min, int $max, string|null $message = null): static
    {
        return $this->add("digits_between", $message, [$min, $max]);
    }

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
    ): static {
        $values = [];

        if (!is_null($width)) $values[] = "width={$width}";

        if (!is_null($height)) $values[] = "height={$height}";

        if (!is_null($minWidth)) $values[] = "min_width={$minWidth}";

        if (!is_null($minHeight)) $values[] = "min_height={$minHeight}";

        if (!is_null($maxWidth)) $values[] = "max_width={$maxWidth}";

        if (!is_null($maxHeight)) $values[] = "max_height={$maxHeight}";

        if (!is_null($ratio)) $values[] = "ratio={$ratio}";

        return empty($values) ? $this : $this->add("dimensions", $message, $values);
    }

    /**
     * validate parameter is an array and has no duplicate values
     *
     * @param bool $strict
     * @param bool $ignoreCase
     * @param string|null $message
     * @return static
     */
    public function distinct(bool $strict = false, bool $ignoreCase = false, string|null $message = null): static
    {
        $values = [];

        if ($strict) $values[] = "strict";

        if ($ignoreCase) $values[] = "ignore_case";

        return $this->add("distinct", $message, $values);
    }

    /**
     * validate parameter does not start with any of values
     *
     * @param array<mixed>|string $values
     * @param string|null $message
     * @return static
     */
    public function doesntStartWith(array|string $values, string|null $message = null): static
    {
        return $this->add("doesnt_start_with", $message, $values);
    }

    /**
     * validate parameter does not end with any of values
     *
     * @param array<mixed>|string $values
     * @param string|null $message
     * @return static
     */
    public function doesntEndWith(array|string $values, string|null $message = null): static
    {
        return $this->add("doesnt_end_with", $message, $values);
    }

    /*----------------------------------------*
     * Rule E
     *----------------------------------------*/

    /**
     * validate parameter is an email address
     *
     * @param string|null $message
     * @return static
     */
    public function email(string|null $message = null): static
    {
        return $this->add("email", $message);
    }

    /**
     * validate parameter ends with one of values
     *
     * @param array<mixed>|string $values
     * @param string|null $message
     * @return static
     */
    public function endsWith(array|string $values, string|null $message = null): static
    {
        return $this->add("ends_with", $message, $values);
    }

    /**
     * validate parameter is a valid Enum value
     *
     * @param string $enum
     * @param \Closure|null $callback
     * @param string|null $message
     * @return static
     */
    public function enum(string $enum, \Closure|null $callback = null, string|null $message = null): static
    {
        $enumRule = Rule::enum($enum);

        if (!is_null($callback)) $enumRule = $callback($enumRule);

        return $this->add("enum", $message, rule: $enumRule);
    }

    /**
     * validate parameter is excluded from validate and validated method data
     *
     * @param string|null $message
     * @return static
     */
    public function exclude(string|null $message = null): static
    {
        return $this->add("exclude", $message);
    }

    /**
     * validate parameter is excluded from validate and validated method data if field is equal to value
     *
     * @param string $field
     * @param mixed $value
     * @param string|null $message
     * @return static
     */
    public function excludeIf(string $field, mixed $value, string|null $message = null): static
    {
        return $this->add("exclude_if", $message, [$field, $value]);
    }

    /**
     * validate parameter is excluded from validate and validated method data if field does not match value
     *
     * @param string $field
     * @param mixed $value
     * @param string|null $message
     * @return static
     */
    public function excludeUnless(string $field, mixed $value, string|null $message = null): static
    {
        return $this->add("exclude_unless", $message, [$field, $value]);
    }

    /**
     * validate parameter is excluded from validate and validated method data if some of fields are present
     *
     * @param array<string>|string $fields
     * @param string|null $message
     * @return static
     */
    public function excludeWith(array|string $fields, string|null $message = null): static
    {
        return $this->add("exclude_with", $message, $fields);
    }

    /**
     * validate parameter is excluded from validate and validated method data if some of fields are not present
     *
     * @param string $field
     * @param string|null $message
     * @return static
     */
    public function excludeWithout(string $field, string|null $message = null): static
    {
        return $this->add("exclude_without", $message, $field);
    }

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
    public function exists(string $table, string|null $column = null, \Closure|null $callback = null, string|null $message = null): static
    {
        if (is_null($column)) $column = $this->key();

        $existsRule = Rule::exists($table, $column);

        if (!is_null($callback)) $existsRule = $callback($existsRule);

        return $this->add("exists", $message, rule: $existsRule);
    }

    /**
     * validate parameter is a file and extension is one of those specified in extensions
     *
     * @param array<string>|string $extensions
     * @param string|null $message
     * @return static
     */
    public function extensions(array|string $extensions, string|null $message = null): static
    {
        return $this->add("extensions", $message, $extensions);
    }

    /*----------------------------------------*
     * Rule F
     *----------------------------------------*/

    /**
     * validate parameter as a file
     *
     * @param string|null $message
     * @return static
     */
    public function file(string|null $message = null): static
    {
        return $this->add("file", $message);
    }

    /**
     * validate parameter is not empty if parameter is present
     *
     * @param string|null $message
     * @return static
     */
    public function filled(string|null $message = null): static
    {
        return $this->add("filled", $message);
    }

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
    public function gt(string $field, string|null $message = null): static
    {
        return $this->add("gt", $message, $field);
    }

    /**
     * validate parameter is greater than or equal to value of field
     *
     * @param string $field
     * @param string|null $message
     * @return static
     */
    public function gte(string $field, string|null $message = null): static
    {
        return $this->add("gte", $message, $field);
    }

    /*----------------------------------------*
     * Rule H
     *----------------------------------------*/

    /**
     * validate parameter is a valid color code in hexadecimal format
     *
     * @param string|null $message
     * @return static
     */
    public function hexColor(string|null $message = null): static
    {
        return $this->add("hex_color", $message);
    }

    /*----------------------------------------*
     * Rule I
     *----------------------------------------*/

    /**
     * validate parameter as an image
     *
     * @param string|null $message
     * @return static
     */
    public function image(string|null $message = null): static
    {
        return $this->add("image", $message);
    }

    /**
     * validate parameter is in values
     *
     * @param array<mixed>|string $values
     * @param string|null $message
     * @return static
     */
    public function in(array|string $values, string|null $message = null): static
    {
        $inRule = Rule::in($values);

        return $this->add("in", $message, rule: $inRule);
    }

    /**
     * validate parameter is one of values field has
     *
     * @param string $field
     * @param string $key
     * @param string|null $message
     * @return static
     */
    public function inArray(string $field, string $key, string|null $message = null): static
    {
        return $this->add("in_array", $message, [$field, $key]);
    }

    /**
     * validate parameter is an integer
     *
     * @param string|null $message
     * @return static
     */
    public function integer(string|null $message = null): static
    {
        return $this->add("integer", $message);
    }

    /**
     * validate parameter is a valid IP address
     *
     * @param string|null $message
     * @return static
     */
    public function ip(string|null $message = null): static
    {
        return $this->add("ip", $message);
    }

    /**
     * validate parameter is an IPv4 address
     *
     * @param string|null $message
     * @return static
     */
    public function ipv4(string|null $message = null): static
    {
        return $this->add("ipv4", $message);
    }

    /**
     * validate parameter is an IPv6 address
     *
     * @param string|null $message
     * @return static
     */
    public function ipv6(string|null $message = null): static
    {
        return $this->add("ipv6", $message);
    }

    /*----------------------------------------*
     * Rule J
     *----------------------------------------*/

    /**
     * validate parameter is a JSON string
     *
     * @param string|null $message
     * @return static
     */
    public function json(string|null $message = null): static
    {
        return $this->add("json", $message);
    }

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
    public function lt(string $field, string|null $message = null): static
    {
        return $this->add("lt", $message, $field);
    }

    /**
     * validate parameter is less than or equal to value of field
     *
     * @param string $field
     * @param string|null $message
     * @return static
     */
    public function lte(string $field, string|null $message = null): static
    {
        return $this->add("lte", $message, $field);
    }

    /**
     * validate parameters are lowercase
     *
     * @param string|null $message
     * @return static
     */
    public function lowercase(string|null $message = null): static
    {
        return $this->add("lowercase", $message);
    }

    /**
     * validate parameter is list array
     *
     * @param string|null $message
     * @return static
     */
    public function list(string|null $message = null): static
    {
        return $this->add("list", $message);
    }

    /*----------------------------------------*
     * Rule M
     *----------------------------------------*/

    /**
     * validate parameter is a valid MAC address
     *
     * @param string|null $message
     * @return static
     */
    public function macAddress(string|null $message = null): static
    {
        return $this->add("mac_address", $message);
    }

    /**
     * validate parameter is less than or equal to max
     *
     * @param int $max
     * @param string|null $message
     * @return static
     */
    public function max(int $max, string|null $message = null): static
    {
        return $this->add("max", $message, $max);
    }

    /**
     * validate number of digits in parameter is less than or equal to max
     *
     * @param int $max
     * @param string|null $message
     * @return static
     */
    public function maxDigits(int $max, string|null $message = null): static
    {
        return $this->add("max_digits", $message, $max);
    }

    /**
     * validate parameter is a file, mime type corresponding to one of mimetypes specified in mimetypes
     *
     * @param array<string>|string $mimetypes
     * @param string|null $message
     * @return static
     */
    public function mimetypes(array|string $mimetypes, string|null $message = null): static
    {
        return $this->add("mimetypes", $message, $mimetypes);
    }

    /**
     * validate parameter is a file, mime type corresponding to one of extensions specified in extensions
     *
     * @param array<string>|string $extensions
     * @param string|null $message
     * @return static
     */
    public function mimes(array|string $extensions, string|null $message = null): static
    {
        return $this->add("mimes", $message, $extensions);
    }

    /**
     * validate parameter is greater than or equal to min
     *
     * @param int $min
     * @param string|null $message
     * @return static
     */
    public function min(int $min, string|null $message = null): static
    {
        return $this->add("min", $message, $min);
    }

    /**
     * validate number of digits in parameter is greater than or equal to min
     *
     * @param int $min
     * @param string|null $message
     * @return static
     */
    public function minDigits(int $min, string|null $message = null): static
    {
        return $this->add("min_digits", $message, $min);
    }

    /**
     * validate parameter is a number multiple of num
     *
     * @param int $num
     * @param string|null $message
     * @return static
     */
    public function multipleOf(int $num, string|null $message = null): static
    {
        return $this->add("multiple_of", $message, $num);
    }

    /**
     * validate parameter is not present
     *
     * @param string|null $message
     * @return static
     */
    public function missing(string|null $message = null): static
    {
        return $this->add("missing", $message);
    }

    /**
     * validate parameter is not present if field matches value
     *
     * @param string $field
     * @param array<mixed> $values
     * @param string|null $message
     * @return static
     */
    public function missingIf(string $field, array $values, string|null $message = null): static
    {
        return $this->add("missing_if", $message, [$field, $values]);
    }

    /**
     * validate parameter is not present if field does not match value
     *
     * @param string $field
     * @param array<mixed> $values
     * @param string|null $message
     * @return static
     */
    public function missingUnless(string $field, array $values, string|null $message = null): static
    {
        return $this->add("missing_unless", $message, [$field, $values]);
    }

    /**
     * validate parameter is not present if some of fields are present
     *
     * @param array<string>|string $fields
     * @param string|null $message
     * @return static
     */
    public function missingWith(array|string $fields, string|null $message = null): static
    {
        return $this->add("missing_with", $message, $fields);
    }

    /**
     * validate parameter is not present if all of fields are present
     *
     * @param array<string>|string $fields
     * @param string|null $message
     * @return static
     */
    public function missingWithAll(array|string $fields, string|null $message = null): static
    {
        return $this->add("missing_with_all", $message, $fields);
    }

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
    public function notIn(array|string $values, string|null $message = null): static
    {
        $notInRule = Rule::notIn($values);

        return $this->add("not_in", $message, rule: $notInRule);
    }

    /**
     * validate parameter does not match regular expression pattern
     *
     * @param string $pattern
     * @param string|null $message
     * @return static
     */
    public function notRegex(string $pattern, string|null $message = null): static
    {
        return $this->add("not_regex", $message, $pattern);
    }

    /**
     * nullable parameter
     *
     * @param string|null $message
     * @return static
     */
    public function nullable(string|null $message = null): static
    {
        return $this->add("nullable", $message);
    }

    /**
     * validate parameter is numeric
     *
     * @param string|null $message
     * @return static
     */
    public function numeric(string|null $message = null): static
    {
        return $this->add("numeric", $message);
    }

    /*----------------------------------------*
     * Rule P
     *----------------------------------------*/

    /**
     * validate parameter is present
     *
     * @param string|null $message
     * @return static
     */
    public function present(string|null $message = null): static
    {
        return $this->add("present", $message);
    }

    /**
     * validate parameter is present if field is equal to value
     *
     * @param string $field
     * @param mixed $value
     * @param string|null $message
     * @return static
     */
    public function presentIf(string $field, mixed $value, string|null $message = null): static
    {
        return $this->add("present_if", $message, [$field, $value]);
    }

    /**
     * validate parameter is present if field does not match value
     *
     * @param string $field
     * @param mixed $value
     * @param string|null $message
     * @return static
     */
    public function presentUnless(string $field, mixed $value, string|null $message = null): static
    {
        return $this->add("present_unless", $message, [$field, $value]);
    }

    /**
     * validate parameter is present if some of fields are present
     *
     * @param string $field
     * @param string|null $message
     * @return static
     */
    public function presentWith(string $field, string|null $message = null): static
    {
        return $this->add("present_with", $message, $field);
    }

    /**
     * validate parameter is present if all of fields are present
     *
     * @param array<string>|string $fields
     * @param string|null $message
     * @return static
     */
    public function presentWithAll(array|string $fields, string|null $message = null): static
    {
        return $this->add("present_with_all", $message, $fields);
    }

    /**
     * validate parameter is not present, or is an empty
     *
     * @param string|null $message
     * @return static
     */
    public function prohibited(string|null $message = null): static
    {
        return $this->add("prohibited", $message);
    }

    /**
     * validate parameter is not present, or is an empty if field matches value
     *
     * @param string $field
     * @param array<mixed> $values
     * @param string|null $message
     * @return static
     */
    public function prohibitedIf(string $field, array $values, string|null $message = null): static
    {
        return $this->add("prohibited_if", $message, [$field, $values]);
    }

    /**
     * validate parameter is not present, or is an empty if field does not match value
     *
     * @param string $field
     * @param array<mixed> $values
     * @param string|null $message
     * @return static
     */
    public function prohibitedUnless(string $field, array $values, string|null $message = null): static
    {
        return $this->add("prohibited_unless", $message, [$field, $values]);
    }

    /**
     * validate all fields in fields are absent or empty if parameter is present and non-empty
     *
     * @param array<string>|string $fields
     * @param string|null $message
     * @return static
     */
    public function prohibits(array|string $fields, string|null $message = null): static
    {
        return $this->add("prohibits", $message, $fields);
    }

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
    public function regex(string $pattern, string|null $message = null): static
    {
        return $this->add("regex", $message, $pattern);
    }

    /**
     * validate parameter is required
     *
     * @param string|null $message
     * @return static
     */
    public function required(string|null $message = null): static
    {
        return $this->add("required", $message);
    }

    /**
     * validate parameter is required if field is equal to value
     *
     * @param string $field
     * @param mixed $value
     * @param string|null $message
     * @return static
     */
    public function requiredIf(string $field, mixed $value, string|null $message = null): static
    {
        return $this->add("required_if", $message, [$field, $value]);
    }

    /**
     * validate parameter is required if field matches 1, true, “on”, “yes”
     *
     * @param array<string>|string $fields
     * @param string|null $message
     * @return static
     */
    public function requiredIfAccepted(array|string $fields, string|null $message = null): static
    {
        return $this->add("required_if_accepted", $message, $fields);
    }

    /**
     * validate parameter is required if field matches 0, false, “off”, “no”
     *
     * @param array<string>|string $fields
     * @param string|null $message
     * @return static
     */
    public function requiredIfDeclined(array|string $fields, string|null $message = null): static
    {
        return $this->add("required_if_declined", $message, $fields);
    }

    /**
     * validate parameter is required if field does not match value
     *
     * @param string $field
     * @param mixed $value
     * @param string|null $message
     * @return static
     */
    public function requiredUnless(string $field, mixed $value, string|null $message = null): static
    {
        return $this->add("required_unless", $message, [$field, $value]);
    }

    /**
     * validate parameter is required if some of fields are present
     *
     * @param array<string>|string $fields
     * @param string|null $message
     * @return static
     */
    public function requiredWith(array|string $fields, string|null $message = null): static
    {
        return $this->add("required_with", $message, $fields);
    }

    /**
     * validate parameter is required if all of fields are present
     *
     * @param array<string>|string $fields
     * @param string|null $message
     * @return static
     */
    public function requiredWithAll(array|string $fields, string|null $message = null): static
    {
        return $this->add("required_with_all", $message, $fields);
    }

    /**
     * validate parameter is required if some of fields are not present
     *
     * @param array<string>|string $fields
     * @param string|null $message
     * @return static
     */
    public function requiredWithout(array|string $fields, string|null $message = null): static
    {
        return $this->add("required_without", $message, $fields);
    }

    /**
     * validate parameter is required if all of fields are not present
     *
     * @param array<string>|string $fields
     * @param string|null $message
     * @return static
     */
    public function requiredWithoutAll(array|string $fields, string|null $message = null): static
    {
        return $this->add("required_without_all", $message, $fields);
    }

    /**
     * validate parameter as an array and validate parameter has specified keys
     *
     * @param array<string>|string $keys
     * @param string|null $message
     * @return static
     */
    public function requiredArrayKeys(array|string $keys, string|null $message = null): static
    {
        return $this->add("required_array_keys", $message, $keys);
    }

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
    public function same(string $field, string|null $message = null): static
    {
        return $this->add("same", $message, $field);
    }

    /**
     * validate parameter has a size of value
     *
     * @param int $size
     * @param string|null $message
     * @return static
     */
    public function size(int $size, string|null $message = null): static
    {
        return $this->add("size", $message, $size);
    }

    /**
     * validate parameter starts with one of values
     *
     * @param array<mixed>|string $values
     * @param string|null $message
     * @return static
     */
    public function startsWith(array|string $values, string|null $message = null): static
    {
        return $this->add("starts_with", $message, $values);
    }

    /**
     * validate parameter is a string
     *
     * @param string|null $message
     * @return static
     */
    public function string(string|null $message = null): static
    {
        return $this->add("string", $message);
    }

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
    public function timezone(array|string $identifiers = [], string|null $message = null): static
    {
        return $this->add("timezone", $message, $identifiers);
    }

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
    public function unique(string $table, string|null $column = null, \Closure|null $callback = null, string|null $message = null): static
    {
        if (is_null($column)) $column = $this->key();

        $uniqueRule = Rule::unique($table, $column);

        if (!is_null($callback)) $uniqueRule = $callback($uniqueRule);

        return $this->add("unique", $message, rule: $uniqueRule);
    }

    /**
     * validate parameters are uppercase
     *
     * @param string|null $message
     * @return static
     */
    public function uppercase(string|null $message = null): static
    {
        return $this->add("uppercase", $message);
    }

    /**
     * validate parameter is a URL
     *
     * @param string|null $message
     * @return static
     */
    public function url(string|null $message = null): static
    {
        return $this->add("url", $message);
    }

    /**
     * validate parameter is a ULID
     *
     * @param string|null $message
     * @return static
     */
    public function ulid(string|null $message = null): static
    {
        return $this->add("ulid", $message);
    }

    /**
     * validate parameter is a UUID
     *
     * @param string|null $message
     * @return static
     */
    public function uuid(string|null $message = null): static
    {
        return $this->add("uuid", $message);
    }
}
