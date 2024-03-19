<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['FirstName', 'LastName','Email', 'Phone', 'Address', 'City', 'State', 'Postcode', 'Country'];
    protected $primaryKey = 'CustomerID';
    public $incrementing = false;
    
    
    public function user()
    {
        return $this->belongsTo(User::class, 'CustomerID', 'id');
    }
}
