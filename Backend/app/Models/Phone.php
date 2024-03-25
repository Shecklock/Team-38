<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = [
        'user_id', 'phone_number', 'type', 'is_primary'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
