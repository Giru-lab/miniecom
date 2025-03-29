<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [

        'user_id',

        'status',

        'quantity',

        'total_price',

    ];

    public function product()

    {

        return $this->belongsToMany(Product::class, 'order_product')->withPivot('quantity');

    }

    public function user()

    {

        return $this->belongsTo(User::class);

    }
    

}