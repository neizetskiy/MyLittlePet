<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image_weight extends Model
{
    use HasFactory;
    protected $fillable = [
        'img',
        'product_variant_id',
    ];

}
