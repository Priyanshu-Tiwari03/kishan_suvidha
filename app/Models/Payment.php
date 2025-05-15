<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';

    protected $fillable = [
    'user_id',
    'name',
    'email',
    'phone',
    'amount',
    'order_id',
    'razorpay_payment_id',
    'status',
    'product_id',
    'unit_price',
    'apartment',
    'city',
    'district',
    'state',
    'pincode',
    'quantity'
];
}
