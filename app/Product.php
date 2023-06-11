<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'category_id',
        'product_name',
        'product_price',
        'product_discount',
        'product_quantity',
        'description',
        'product_hot',
        'image',
    ];
}
