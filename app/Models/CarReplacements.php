<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarReplacements extends Model
{
    protected $table = 'car_replacements';
    protected $primaryKey = 'id';
    protected $fillable = [
        'parent_id',
        'title',
        'hm_est_f32_price',
        'hm_est_u64_price',
        'lm_est_f32_price',
        'lm_est_u64_price',
        'counter',
        'sort'
    ];
}
