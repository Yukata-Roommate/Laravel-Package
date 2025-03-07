<?php

namespace YukataRm\Laravel\Auth\Model;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Password Reset Token Model
 *
 * @property int $id
 * @property int $user_id
 * @property string $token
 * @property \Illuminate\Support\Carbon $expired_at
 */
class PasswordResetToken extends Model
{
    use HasFactory;

    const CREATED_AT = null;
    const UPDATED_AT = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "user_id",
        "token",
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            "expired_at" => "datetime",
        ];
    }

    /*----------------------------------------*
     * Expired At
     *----------------------------------------*/

    /**
     * whether expired
     *
     * @return bool
     */
    public function isExpired(): bool
    {
        return $this->expired_at->isPast();
    }
}
