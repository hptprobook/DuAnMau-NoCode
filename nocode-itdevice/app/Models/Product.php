<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

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

    function image()
    {
        return $this->hasMany('App\Models\Image');
    }
}
