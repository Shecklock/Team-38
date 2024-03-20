<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';

    protected $fillable = ['OrderID', 'ProductID', 'Quantity', 'Price'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'OrderID');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductID');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'OrderID');
    }

}
