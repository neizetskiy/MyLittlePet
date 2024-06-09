<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=['name','description','category_id','subcategory_id','foodtype_id','ingredients','minerals'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function foodtype()
    {
        return $this->belongsTo(Foodtype::class);
    }

    public function productVariants()
    {
        return $this->hasMany(ProductVariant::class);
    }

}
