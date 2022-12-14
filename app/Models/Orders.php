<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function scopeStatus($query, $type)
    {
        return $query->where('status', $type);
    }
    public function scopeToday($query)
    {
        return $query->whereDate('created_at', \Carbon\Carbon::today());
    }
}
