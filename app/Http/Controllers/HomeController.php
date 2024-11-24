<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;
use App\Models\Wishlist;

class HomeController extends Controller
{


    public function showHome()
    {
        $products = Product::where('auction_end_time', '>', Carbon::now()) // المنتجات التي لم ينتهِ وقت المزاد الخاص بها
            ->orderBy('auction_end_time', 'asc') // ترتيب حسب أقرب وقت انتهاء
            ->take(8) // عرض أول 8 منتجات
            ->get();

        return view('index', compact('products')); // عرض البيانات في صفحة home
    }

    public function showProductDetails($id)
    {
        $product = Product::with(['images', 'category', 'user'])->findOrFail($id);

        // Calculate the increment value
        $incrementValue = $product->starting_price * ($product->increment_percentage / 100)-1;

        // Get the highest offer or fallback to the starting price
        $highestOffer = $product->priceOffers()->max('offer_price');
        $displayedPrice = $highestOffer ?? $product->starting_price;

        // Calculate the remaining time
        $auctionEndTime = $product->auction_end_time;
        $remainingTime = now()->diffForHumans($auctionEndTime, ['parts' => 3]);

        // Pass the values to the view
        return view('product-detail', compact('product', 'displayedPrice', 'incrementValue', 'remainingTime'));
    }








    public function addToWishlist(Request $request, $productId)
    {
        $user = auth()->user(); // المستخدم المسجل
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login to add items to your wishlist.');
        }

        // تحقق إذا كان المنتج موجود بالفعل في المفضلة
        $wishlist = Wishlist::where('user_id', $user->id)->where('product_id', $productId)->first();

        if ($wishlist) {
            return back()->with('message', 'Product is already in your wishlist.');
        }

        // أضف المنتج إلى المفضلة
        Wishlist::create([
            'user_id' => $user->id,
            'product_id' => $productId,
        ]);

        return back()->with('success', 'Product added to your wishlist.');
    }
}
