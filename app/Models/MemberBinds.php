<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberBinds extends Model
{
    protected $table = 'member_binds';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'app_id',
        'open_id',
        'union_id',
        'session_key',
        'access_token',
        'created_at',
        'updated_at',
    ];
}
