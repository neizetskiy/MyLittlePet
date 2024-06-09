<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = ['order_id','product_id','product_img','product_name','price','weight','quantity'];

     public function productvariant()
     {
         return $this->belongsTo(ProductVariant::class);
     }
}


