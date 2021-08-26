<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'shot_description',
        'description',
        'regular_price',
        'sell_price',
        'sku',
        'quantity',
        'image',
        'image_gallery',
        'stock_status',
        'status',
    ];
}
