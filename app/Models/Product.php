<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'buy_price',
        'sell_price',
        'discount_code',
        'image',
    ];
    protected $table='products';
    protected $primaryKey= 'product_id';
}
