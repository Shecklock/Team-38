<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'FirstName', 'Email', 'Phone', 'Address', 'City', 'State', 'Postcode', 'Country',
    ];

    protected $primaryKey = 'CustomerID';
    public $incrementing = false;

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'CustomerID', 'id');
    }
}
