<?php   
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    protected $primaryKey = 'order_id';

    protected $fillable = [
        'uid',
        'address',
        'city',
        'pincode',
        'phone',
        'pid',
        'category',
        'sub_category',
        'quantity',
        'total_price',
        'payment_type',
        'payment_status',
        'order_status',
        'order_date',
    ];

    public $timestamps = false; // because we're using order_date instead of created_at/updated_at

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'uid');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'pid');
    }
}
