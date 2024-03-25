<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceReview extends Model
{
	use HasFactory;
    // Define the table associated with the model, if not following Laravel's naming convention
    protected $table = 'service_reviews';

    // Specify the fields that are mass assignable
    protected $fillable = ['reviewer_name', 'review_text', 'rating'];
}
