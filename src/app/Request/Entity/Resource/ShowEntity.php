<?php

namespace YukataRm\Laravel\Request\Entity\Resource;

use YukataRm\Laravel\Request\Entity\BaseEntity;

/**
 * Show Request Entity
 *
 * @package YukataRm\Laravel\Request\Entity\Resource
 */
abstract class ShowEntity extends BaseEntity
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
