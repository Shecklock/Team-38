<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'OrderID';
    protected $fillable = [
        'Status'
    ];

    // Define relationships
    public function customer()
    {
        return $this->belongsTo(User::class, 'CustomerID');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'OrderID');
    }
}
