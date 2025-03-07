<?php

namespace YukataRm\Laravel\Trait\Model;

/**
 * Is Active Model Trait
 *
 * @package YukataRm\Laravel\Trait\Model
 *
 * @property bool $is_active
 *
 * @method void save()
 */
trait IsActive
{
    /**
     * whether is active
     *
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->is_active;
    }

    /**
     * change to active
     *
     * @param bool $save
     * @return void
     */
    public function active(bool $save = false): void
    {
        $this->is_active = true;

        if ($save) $this->save();
    }

    /**
     * change to inactive
     *
     * @param bool $save
     * @return void
     */
    public function inactive(bool $save = false): void
    {
        $this->is_active = false;

        if ($save) $this->save();
    }
}
