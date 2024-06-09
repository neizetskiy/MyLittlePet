<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'customer_email', 'customer_name', 'customer_phone', 'payment', 'description', 'status', 'total'];

    public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
