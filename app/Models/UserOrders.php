<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrders extends Model
{
    protected $table = 'user_orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'car_brand_id',
        'car_brand_series_id',
        'member_id',
        'car_info_id',
        'order_number',
        'est_amount',
        'act_amount',
        'expired_at',
        'payment_method',
        'paid_at',
        'order_status',
        'comment',
        'partner_store_id',
        'installer_phone_number',
        'installer_name',
        'est_f32_total_price',
        'est_u64_total_price',
    ];
}
