<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    // Add fillable property to allow mass assignment
    protected $fillable = [
        'user_id',
        'product_id', // Allow mass assignment for user_id
        'what_you_need',
        'email',
        'city',
        'delivery_address',
        'name',
        'special_instructions',
        'price',
        'payment_type',

    ];

    public function user()
{
    return $this->belongsTo(User::class); // Assuming you have a foreign key 'user_id'
}

}
