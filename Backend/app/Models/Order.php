<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'OrderID';
    // Allows Status to be assigned
    protected $fillable = [
        'UserID','CustomerID', 'OrderDate', 'TotalAmount', 'Status'
    ];
    protected $tableOrderDetails = 'order_details';



    // Define relationships
    public function customer()
    {
        return $this->belongsTo(User::class, 'CustomerID');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'OrderID');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductID');
    }
}
