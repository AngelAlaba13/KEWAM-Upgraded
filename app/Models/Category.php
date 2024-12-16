<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'category',
        'quantity',
        'price',
        'value',
        'image_path', // Add this line
        'sold_quantity',
        'total_price_sold'
    ];


}
