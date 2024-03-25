<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'OrderID';
    // Allows Status to be assigned
    protected $fillable = [
        'UserID', 'OrderDate', 'TotalAmount', 'Status'
    ];
    protected $tableOrderDetails = 'order_details';



    // Define relationships
    public function customer()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

	public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class, 'order_product', 'OrderID', 'ProductID')
                ->withPivot('Quantity', 'size_id')
                ->using(OrderProduct::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductID');
    }
    
    public function sizes()
{
    return $this->belongsToMany(Size::class, 'product_sizes', 'product_id', 'size_id')
                ->withPivot('Quantity');
}

	public function decreaseStock()
{
    DB::beginTransaction();
    try {
        foreach ($this->products as $product) {
            // The size ID and quantity needed are stored in the pivot table between Order and Product
            $sizeId = $product->pivot->size_id;
            $quantityToDecrease = $product->pivot->Quantity;

            // Find the pivot entry between Product and Size to update the stock
            $productSize = DB::table('product_sizes')
                             ->where('product_id', $product->ProductID)
                             ->where('size_id', $sizeId)
                             ->first();

            if ($productSize && $productSize->Quantity >= $quantityToDecrease) {
                // Decrease the quantity
                DB::table('product_sizes')
                    ->where('product_id', $product->ProductID)
                    ->where('size_id', $sizeId)
                    ->update(['Quantity' => $productSize->Quantity - $quantityToDecrease]);

                Log::info("Stock decreased for ProductID {$product->ProductID}, SizeID {$sizeId}, Quantity {$quantityToDecrease}.");
            } else {
                Log::warning("Insufficient stock for ProductID {$product->ProductID}, SizeID {$sizeId}.");
                throw new \Exception("Insufficient stock for ProductID {$product->ProductID}, SizeID {$sizeId}.");
            }
        }

        DB::commit();
    } catch (\Exception $e) {
        DB::rollBack();
        Log::error("Error decreasing stock: " . $e->getMessage());
        // Consider how you want to handle this error. You might want to rethrow it or handle it differently.
        throw $e;
    }
}

public function increaseStock()
	{
		foreach ($this->products as $product) {
        	$sizeId = $product->pivot->size_id;
            $quantityToIncrease = $product->pivot->Quantity;
        	foreach ($product->sizes as $size) {
            	// Makes sure only the ordered products are selected
            	if ($sizeId == $size->pivot->size_id) {
                	$productSize = DB::table('product_sizes')
                             ->where('product_id', $product->ProductID)
                             ->where('size_id', $sizeId)
                             ->first();
                
        			DB::table('product_sizes')
                    		->where('product_id', $product->ProductID)
                    		->where('size_id', $sizeId)
                    		->update(['Quantity' => $productSize->Quantity + $quantityToIncrease]);

                	Log::info("Stock increased for ProductID {$product->ProductID}, SizeID {$sizeId}, Quantity {$quantityToIncrease}.");
                	break;
            	} else {
                	Log::warning("ProductID {$product->ProductID} has no SizeID {$sizeId}.");
                	throw new \Exception("ProductID {$product->ProductID} has no SizeID {$sizeId}.");
            	}
        	}
		}
	}
}
