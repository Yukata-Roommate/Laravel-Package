<?php

namespace YukataRm\Laravel\Interface\Validation;

use YukataRm\Laravel\Interface\Validation\LaravelRulesInterface;

/**
 * Validation Rules Interface
 *
 * @package YukataRm\Laravel\Interface\Validation
 */
interface RulesInterface extends LaravelRulesInterface
{
    /*----------------------------------------*
     * Between
     *----------------------------------------*/

    /**
     * validate parameter is flag integer
     *
     * @param string|null $message
     * @return static
     */
    public function flag(string|null $message = null): static;

    /*----------------------------------------*
     * Date Format
     *----------------------------------------*/

    /**
     * validate parameter is a value can be treated as a date and follows Y-m-d format
     *
     * @param string|null $message
     * @return static
     */
    public function asDate(string|null $message = null): static;

    /**
     * validate parameter is a value can be treated as a date and follows H:i:s format
     *
     * @param string|null $message
     * @return static
     */
    public function asTime(string|null $message = null): static;

    /**
     * validate parameter is a value can be treated as a date and follows Y-m-d H:i:s format
     *
     * @param string|null $message
     * @return static
     */
    public function asDateTime(string|null $message = null): static;

    /**
     * validate parameter is a value can be treated as a date and follows Y-m format
     *
     * @param string|null $message
     * @return static
     */
    public function asYearMonth(string|null $message = null): static;

    /**
     * validate parameter is a value can be treated as a date and follows m-d format
     *
     * @param string|null $message
     * @return static
     */
    public function asMonthDay(string|null $message = null): static;

    /**
     * validate parameter is a value can be treated as a date and follows H:i format
     *
     * @param string|null $message
     * @return static
     */
    public function asHourMinute(string|null $message = null): static;

    /**
     * validate parameter is a value can be treated as a date and follows i:s format
     *
     * @param string|null $message
     * @return static
     */
    public function asMinuteSecond(string|null $message = null): static;

    /**
     * validate parameter is a value can be treated as a date and is a valid year
     *
     * @param string|null $message
     * @return static
     */
    public function asYear(string|null $message = null): static;

    /**
     * validate parameter is a value can be treated as a date and is a valid month
     *
     * @param string|null $message
     * @return static
     */
    public function asMonth(string|null $message = null): static;

    /**
     * validate parameter is a value can be treated as a date and is a valid 0-padded month
     *
     * @param string|null $message
     * @return static
     */
    public function asMonthZero(string|null $message = null): static;

    /**
     * validate parameter is a value can be treated as a date and is a valid month name
     *
     * @param string|null $message
     * @return static
     */
    public function asMonthName(string|null $message = null): static;

    /**
     * validate parameter is a value can be treated as a date and is a valid short month name
     *
     * @param string|null $message
     * @return static
     */
    public function asMonthNameShort(string|null $message = null): static;

    /**
     * validate parameter is a value can be treated as a date and is a valid day
     *
     * @param string|null $message
     * @return static
     */
    public function asDay(string|null $message = null): static;

    /**
     * validate parameter is a value can be treated as a date and is a valid 0-padded day
     *
     * @param string|null $message
     * @return static
     */
    public function asDayZero(string|null $message = null): static;

    /**
     * validate parameter is a value can be treated as a date and is a valid hour
     *
     * @param string|null $message
     * @return static
     */
    public function asHour(string|null $message = null): static;

    /**
     * validate parameter is a value can be treated as a date and is a valid 0-padded hour
     *
     * @param string|null $message
     * @return static
     */
    public function asHourZero(string|null $message = null): static;

    /**
     * validate parameter is a value can be treated as a date and is a valid 12-hour notation hour
     *
     * @param string|null $message
     * @return static
     */
    public function asHourTwelveNotation(string|null $message = null): static;

    /**
     * validate parameter is a value can be treated as a date and is a valid 0-padded 12-hour notation hour
     *
     * @param string|null $message
     * @return static
     */
    public function asHourTwelveNotationZero(string|null $message = null): static;

    /**
     * validate parameter is a value can be treated as a date and is a valid minute
     *
     * @param string|null $message
     * @return static
     */
    public function asMinute(string|null $message = null): static;

    /**
     * validate parameter is a value can be treated as a date and is a valid second
     *
     * @param string|null $message
     * @return static
     */
    public function asSecond(string|null $message = null): static;

    /*----------------------------------------*
     * Exists
     *----------------------------------------*/

    /**
     * validate parameter is present in column of table in which deleted_at column is null
     * if column is not specified, keyName is used instead
     *
     * @param string $table
     * @param string|null $column
     * @param string $deletedAtColumn
     * @param string|null $message
     * @return static
     */
    public function existsNotDeleted(string $table, string|null $column = null, string $deletedAtColumn = "deleted_at", string|null $message = null): static;

    /**
     * validate parameter is present in column of table in which deleted_at column is not null
     * if column is not specified, keyName is used instead
     *
     * @param string $table
     * @param string|null $column
     * @param string $deletedAtColumn
     * @param string|null $message
     * @return static
     */
    public function existsDeleted(string $table, string|null $column = null, string $deletedAtColumn = "deleted_at", string|null $message = null): static;

    /**
     * validate parameter is present in id column of table
     *
     * @param string $table
     * @param string|null $message
     * @return static
     */
    public function id(string $table, string|null $message = null): static;

    /*----------------------------------------*
     * Regex
     *----------------------------------------*/

    /**
     * validate parameter matches pattern of a valid telephone number
     *
     * @param string|null $message
     * @return static
     */
    public function tel(string|null $message = null): static;

    /**
     * validate parameter matches pattern of a valid post code
     *
     * @param string|null $message
     * @return static
     */
    public function postCode(string|null $message = null): static;

    /*----------------------------------------*
     * Unique
     *----------------------------------------*/

    /**
     * validate parameter is not present in column of table in which deleted_at column is null
     * if column is not specified, keyName is used instead
     *
     * @param string $table
     * @param string|null $column
     * @param string $deletedAtColumn
     * @param string|null $message
     * @return static
     */
    public function uniqueNotDeleted(string $table, string|null $column = null, string $deletedAtColumn = "deleted_at", string|null $message = null): static;

    /**
     * validate parameter is not present in column of table in which deleted_at column is not null
     * if column is not specified, keyName is used instead
     *
     * @param string $table
     * @param string|null $column
     * @param string $deletedAtColumn
     * @param string|null $message
     * @return static
     */
    public function uniqueDeleted(string $table, string|null $column = null, string $deletedAtColumn = "deleted_at", string|null $message = null): static;

    /**
     * validate parameter is present in ignoreColumn of table
     *
     * @param string $table
     * @param string|null $column
     * @param mixed $ignore
     * @param string $ignoreColumn
     * @param string|null $message
     * @return static
     */
    public function uniqueIgnore(string $table, string|null $column = null, mixed $ignore = null, string $ignoreColumn = "id", string|null $message = null): static;

    /**
     * validate parameter is present in ignoreColumn of table in which deleted_at column is null
     *
     * @param string $table
     * @param string|null $column
     * @param mixed $ignore
     * @param string $ignoreColumn
     * @param string $deletedAtColumn
     * @param string|null $message
     * @return static
     */
    public function uniqueIgnoreNotDeleted(
        string $table,
        string|null $column = null,
        mixed $ignore = null,
        string $ignoreColumn = "id",
        string $deletedAtColumn = "deleted_at",
        string|null $message = null,
    ): static;

    /**
     * validate parameter is present in ignoreColumn of table in which deleted_at column is not null
     *
     * @param string $table
     * @param string|null $column
     * @param mixed $ignore
     * @param string $ignoreColumn
     * @param string $deletedAtColumn
     * @param string|null $message
     * @return static
     */
    public function uniqueIgnoreDeleted(
        string $table,
        string|null $column = null,
        mixed $ignore = null,
        string $ignoreColumn = "id",
        string $deletedAtColumn = "deleted_at",
        string|null $message = null,
    ): static;
}
