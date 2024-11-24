<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceOffer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'user_id',
        'offer_price',
    ];

    /**
     * Relationship: Product
     * Each price offer belongs to a product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Relationship: User
     * Each price offer is made by a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
