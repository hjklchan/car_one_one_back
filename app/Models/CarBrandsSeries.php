<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarBrandsSeries extends Model
{
    protected $table = 'car_brands_series';
    protected $primaryKey = 'series_id';
    protected $fillable = [
        'brand_id',
        'series_name',
        'sub_brand_name',
        'image_url',
        'official_price_up',
        'official_price',
        'official_price_down',
        'dealer_price_up',
        'dealer_price',
        'dealer_price_down',
        'category_name',
        'business_status',
    ];
}
