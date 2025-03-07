<?php

namespace YukataRm\Laravel\View\Compose;

use Illuminate\View\View;

/**
 * Base Composer
 *
 * @package YukataRm\Laravel\View\Compose
 */
abstract class BaseComposer
{
    /**
     * compose view
     *
     * @param \Illuminate\View\View $view
     */
    abstract public function compose(View $view);
}
