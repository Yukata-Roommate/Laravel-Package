<?php

namespace YukataRm\Laravel\Request\Entity\Resource;

use YukataRm\Laravel\Request\Entity\BaseEntity;

/**
 * Edit Request Entity
 *
 * @package YukataRm\Laravel\Request\Entity\Resource
 */
abstract class EditEntity extends BaseEntity
{
    /**
     * id
     *
     * @var int
     */
    public int $id;

    /**
     * bind property
     *
     * @return void
     */
    public function bind(): void
    {
        $this->id = $this->int("id");
    }
}
