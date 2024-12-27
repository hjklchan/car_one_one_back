<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerStores extends Model
{
    protected $table = 'partner_stores';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'short_title',
        'english_title',
        'store_number',
        'address',
        'full_address',
        'phone_number',
        'longitude',
        'latitude',
        'position',
        'description',
        'html_description',
        'status',
        'created_at',
        'updated_at',
        'location',
    ];
}
