<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'img_url', 'img_title', 'img_alt', 'product_id'];

    function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
