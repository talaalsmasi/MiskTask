<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'starting_price',
        'increment_percentage',
        'category_id',
        'user_id',
        'auction_end_time', // إضافة auction_end_time للحقول القابلة للتعبئة
    ];

    /**
     * Relationship: Category
     * Each product belongs to a category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relationship: User
     * Each product belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship: Price Offers
     * Each product can have multiple price offers.
     */
    public function priceOffers()
    {
        return $this->hasMany(PriceOffer::class);
    }

    /**
     * Relationship: Highest Offer
     * Get the highest price offer for the product.
     */
    public function highestOffer()
    {
        return $this->hasOne(PriceOffer::class)->latest('offer_price');
    }

    /**
     * Relationship: Product Images
     * Each product can have multiple images.
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * Accessor: Remaining Time
     * Get the remaining time until the auction ends.
     */
    public function getRemainingTimeAttribute()
    {
        $now = now();
        if ($this->auction_end_time) {
            $remaining = $now->diffForHumans($this->auction_end_time, true);
            return $this->auction_end_time > $now ? $remaining : 'Auction ended';
        }

        return 'No auction end time set';
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }


}
