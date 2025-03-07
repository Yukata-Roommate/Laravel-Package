<?php

namespace YukataRm\Laravel\Model;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use YukataRm\Laravel\Interface\Repository\ModelInterface;

/**
 * Base Model
 *
 * @package YukataRm\Laravel\Model
 */
abstract class BaseModel extends Model implements ModelInterface
{
    use HasFactory;
}
