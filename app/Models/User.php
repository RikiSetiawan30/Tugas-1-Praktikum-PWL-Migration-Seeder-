<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'npm';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'npm', 'username', 'first_name', 'last_name',
        'email', 'password',
    ];

    protected $hidden = ['password'];

    public function loans()
    {
        return $this->hasMany(Loan::class, 'user_npm', 'npm');
    }
}