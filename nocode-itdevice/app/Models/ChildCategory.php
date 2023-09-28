<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ChildCategory extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    public $countChildCategory;

    protected $fillable = [
        'id',
        'name',
        'cat_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }
}
