<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['FirstName', 'Email', 'Phone', 'Address', 'City', 'State', 'Postcode', 'Country'];
    
    protected static function booted()
    {
        static::saving(function ($customer) {
            $customer->LastName = ' '; // Set your static value here
        });

        static::saving(function ($customer) {
            $customer->Phone = ' '; // Set your static value here
        });

        static::saving(function ($customer) {
            $customer->Address = ' '; // Set your static value here
        });

        static::saving(function ($customer) {
            $customer->City = ' '; // Set your static value here
        });

        static::saving(function ($customer) {
            $customer->State = ' '; // Set your static value here
        });

        static::saving(function ($customer) {
            $customer->Postcode = ' '; // Set your static value here
        });

        static::saving(function ($customer) {
            $customer->Country = ' '; // Set your static value here
        });
    }

    public function user()
        {
        return $this->belongsTo(User::class, 'CustomerID', 'id');
        }
}
