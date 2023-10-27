<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; // Specify the table name

    protected $fillable = [
        'product_name',
        'price',
        'description',
        'image',
    ];
}
