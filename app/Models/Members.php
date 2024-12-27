<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
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
}
