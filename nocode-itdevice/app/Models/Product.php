<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $countProduct;

    protected $fillable =
    [
        'id',
        'name',
        'price',
        'avatar',
        'discount',
        'product_code',
        'description',
        'detail',
        'cat_id',
        'status'
    ];

    function images()
    {
        return $this->hasMany('App\Models\Image');
    }
}
