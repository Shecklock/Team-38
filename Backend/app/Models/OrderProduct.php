<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderProduct extends Pivot
{
    // Define the table if it's not the default 'order_product'
    protected $table = 'product_order'; // or whatever your pivot table is named

    // If you want to have Eloquent manage created_at and updated_at timestamps
    public $timestamps = true;

    // If you want to allow mass assignment for certain fields
    protected $fillable = ['order_id', 'product_id', 'size_id', 'Quantity'];

    // Define the relationships if needed, for example:

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // If you have size information on the pivot
    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}
