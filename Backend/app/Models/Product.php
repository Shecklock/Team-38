<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'ProductID';

    protected $fillable = [
        'ProductName', 'Description', 'image', 'Price', 'CategoryID', 'StockQuantity', // Add 'StockQuantity' here
    ];

    protected $table = 'products';
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'CategoryID');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'CustomerID');
    }
}
