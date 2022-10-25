<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = [
        'order_id',
        'name',
        'email',
        'phone',
        'address',
        'country',
        'amount',
        'slug',
        'transactionId',
        'status',
        'comment',
        'status',
        'applied_coupon'
    ];
}
