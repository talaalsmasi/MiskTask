<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\PriceOffer;
use App\Models\Category;


class BidController extends Controller
{
    public function placeBid(Request $request, $id)
    {
        // Check if the user is logged in
        if (!auth()->check()) {
            return redirect()->route('ShowLogin')->with('error', 'You need to log in first to place a bid.');
        }

        // Validate the bid input
        $request->validate([
            'bid_price' => 'required|numeric|min:0',
        ]);

        $product = Product::findOrFail($id);

        // Check if auction is still active
        if (now()->greaterThan($product->auction_end_time)) {
            return back()->with('error', 'The auction has ended.');
        }

        // Check if bid is higher than the current price
        $highestOffer = $product->priceOffers()->max('offer_price') ?? $product->starting_price;
        if ($request->bid_price <= $highestOffer) {
            return back()->with('error', 'Your bid must be higher than the current price.');
        }

        // Save the bid
        PriceOffer::create([
            'product_id' => $product->id,
            'user_id' => auth()->id(),
            'offer_price' => $request->bid_price,
        ]);

        return back()->with('success', 'Your bid has been placed successfully!');
    }



    public function showAllProducts()
    {
        // Retrieve all products with their relationships
        $products = Product::with(['category', 'user', 'images'])->get();

        // Retrieve all categories
        $categories = Category::all();

        // Pass products and categories to the view
        return view('products', compact('products', 'categories'));
    }


}

