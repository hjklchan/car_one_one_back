<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarOwnerInfos extends Model
{
    protected $table = 'car_owner_infos';
    protected $primaryKey = 'id';
    protected $fillable =[
        'user_id',
        'name',
        'phone_number',
        'province',
        'city',
        'districts',
        'multilevel_address',
        'comment',
        'full_address',
        'longitude',
        'latitude',
        'user_order_id',
    ];
}
