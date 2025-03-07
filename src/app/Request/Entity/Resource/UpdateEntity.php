<?php

namespace YukataRm\Laravel\Request\Entity\Resource;

use YukataRm\Laravel\Request\Entity\BaseEntity;

/**
 * Update Request Entity
 *
 * @package YukataRm\Laravel\Request\Entity\Resource
 */
abstract class UpdateEntity extends BaseEntity
{
    /**
     * id
     *
     * @var int
     */
    public int $id;

    /**
     * prepare bind properties
     *
     * @return void
     */
    protected function prepare(): void
    {
        $this->id = $this->int("id");
    }
}
