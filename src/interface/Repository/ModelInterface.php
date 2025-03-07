<?php

namespace YukataRm\Laravel\Interface\Repository;

use YukataRm\Laravel\Interface\Repository\EntityInterface;

/**
 * Model Interface
 *
 * @package YukataRm\Laravel\Interface\Repository
 */
interface ModelInterface
{
    /**
     * convert to Entity
     *
     * @return \YukataRm\Laravel\Interface\Repository\EntityInterface
     */
    public function toEntity(): EntityInterface;

    /*----------------------------------------*
     * Default
     *----------------------------------------*/

    /**
     * get Eloquent Builder
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function newQuery();

    /**
     * convert properties to array
     *
     * @return array<string, mixed>
     */
    public function toArray();

    /**
     * get primary key
     *
     * @return string|array<string>
     */
    public function getKeyName();
}
