<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Cart.php

class Cart extends Model
{
    protected $table = 'carts'; // The name of your cart table

    protected $fillable = ['user_id', 'product_id'];

    // Define the relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');  // Relation with
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
