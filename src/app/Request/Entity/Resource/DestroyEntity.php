<?php

namespace YukataRm\Laravel\Request\Entity\Resource;

use YukataRm\Laravel\Request\Entity\BaseEntity;

/**
 * Destroy Request Entity
 *
 * @package YukataRm\Laravel\Request\Entity\Resource
 */
abstract class DestroyEntity extends BaseEntity
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
