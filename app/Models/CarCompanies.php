<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarCompanies extends Model
{
    protected $table = 'car_companies';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'description',
        'short_name',
    ];
}
