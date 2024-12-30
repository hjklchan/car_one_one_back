<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Members extends Model implements JWTSubject
{
    use Notifiable;
    protected $table = 'members';
    protected $primaryKey = 'id';
    protected $fillable = [
        'username',
        'avatar_url',
        'phone_number',
        'locked',
        'password',
        'remember_token',
        'created_at',
        'updated_at',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
