<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'ProductID';

    protected $fillable = [
        'ProductName', 'Description', 'image', 'Price', 'CategoryID',
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

    public function orderDetails()
{
    return $this->hasMany(OrderDetail::class, 'ProductID');
}

}
