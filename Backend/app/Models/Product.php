<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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

    public function order(){
        return $this->belongsToMany(Order::class, 'order_product', 'ProductID', 'OrderID')
                ->withPivot('Quantity');
    }
    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_sizes', 'product_id', 'size_id');
    }


}
