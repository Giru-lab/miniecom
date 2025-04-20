<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'description', 'price', 'stock', 'image', 'category_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function order(){

        return $this->belongsToMany(order::class, 'order_product')->withPivot('quantity');

    }

}
