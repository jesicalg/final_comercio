<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as BaseUser;
use Illuminate\Notifications\Notifiable;

/**
 * App\Models\User
 *
 * @property int $user_id
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserId($value)
 * @property string|null $role
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @mixin \Eloquent
 */
class User extends BaseUser
{
    use Notifiable;
    protected $primaryKey = "user_id";
    protected $hidden = ["password", "remember_token"];
    protected $fillable = ['email', 'password'];

    public static function validationRules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:5'
        ];
    }

    public static function validationMessages(): array
    {
        return [
            'email.required' => 'Tenés que escribir un mail',
            'email.email' => 'Tenés que escribir un mail valido',
            'password.min' => 'La contraseña debe tener al menos :min caracteres',
            'password.required' => 'Tenés que escribir el precio de la película'
        ];
    }
}
