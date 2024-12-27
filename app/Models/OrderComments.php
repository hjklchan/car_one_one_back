<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderComments extends Model
{
    protected $table = 'order_comments';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_order_id',
        'user_id',
        'published_at',
        'title',
        'rate',
        'content',
        'client',
    ];
}
