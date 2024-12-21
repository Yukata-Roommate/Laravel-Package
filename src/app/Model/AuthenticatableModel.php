<?php

namespace YukataRm\Laravel\Model;

use Illuminate\Foundation\Auth\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

use YukataRm\Laravel\Interface\Repository\ModelInterface;

/**
 * Base Model
 *
 * @package YukataRm\Laravel\Model
 */
abstract class AuthenticatableModel extends User implements ModelInterface
{
    use HasFactory, Notifiable;
}
