<?php

namespace YukataRm\Laravel\Trait\Auth;

/**
 * Auth Lang Trait
 *
 * @package YukataRm\Laravel\Trait\Auth
 */
trait Lang
{
    /**
     * get lang
     *
     * @param string $key
     * @param array<string, mixed> $replace
     * @return string
     */
    protected function lang(string $key, array $replace = []): string
    {
        return __("yukata-rm::auth.$key", $replace);
    }
}
