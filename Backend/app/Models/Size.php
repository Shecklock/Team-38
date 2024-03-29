<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Size extends Model
{
    use HasFactory;

    protected $table = 'sizes';
   
    public function products()
{
    return $this->belongsToMany(Product::class, 'product_sizes', 'size_id', 'product_id')
                ->withPivot('quantity');
}

	public function orderProduct()
    {
        return $this->hasMany(OrderProduct::class);
    }

	 public function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }

}
