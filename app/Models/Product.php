<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        'min_price',
        'payment_options',
        'city',
        'description',
        'size',
        'image',
        'user_id', // Make sure to include user_id in fillable attributes

    ];



    // You may also want to define relationships here if needed
     // Define the relationship with User
     public function user()
     {
         return $this->belongsTo(User::class);
     }

}
