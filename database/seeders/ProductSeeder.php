<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Speaker',
            'description' => 'A vintage speaker from the past, perfect for collectors.',
            'starting_price' => 1000.00,
            'increment_percentage' => 5.00,
            'category_id' => 1,
            'user_id' => 1,
            'auction_end_time' => Carbon::now()->addDays(2),
        ]);

        Product::create([
            'name' => 'Bag',
            'description' => 'An old-fashioned leather bag, ideal for vintage enthusiasts.',
            'starting_price' => 500.00,
            'increment_percentage' => 2.50,
            'category_id' => 8,
            'user_id' => 1,
            'auction_end_time' => Carbon::now()->addHours(12),
        ]);

        Product::create([
            'name' => 'Radio',
            'description' => 'A classic radio with a timeless design for retro lovers.',
            'starting_price' => 150.00,
            'increment_percentage' => 1.50,
            'category_id' => 2,
            'user_id' => 2,
            'auction_end_time' => Carbon::now()->addDays(1)->addHours(5),
        ]);

        Product::create([
            'name' => 'TV',
            'description' => 'A retro TV set that brings nostalgia to your living room.',
            'starting_price' => 1000.00,
            'increment_percentage' => 5.00,
            'category_id' => 3,
            'user_id' => 1,
            'auction_end_time' => Carbon::now()->addDays(2),
        ]);

        Product::create([
            'name' => 'Typewriters',
            'description' => 'An antique typewriter, a gem for writing enthusiasts.',
            'starting_price' => 500.00,
            'increment_percentage' => 2.50,
            'category_id' => 4,
            'user_id' => 1,
            'auction_end_time' => Carbon::now()->addHours(12),
        ]);

        Product::create([
            'name' => 'Telephone',
            'description' => 'A classic rotary telephone from the golden age of communication.',
            'starting_price' => 150.00,
            'increment_percentage' => 1.50,
            'category_id' => 5,
            'user_id' => 2,
            'auction_end_time' => Carbon::now()->addDays(1)->addHours(5),
        ]);

        Product::create([
            'name' => 'Camera',
            'description' => 'A vintage camera, perfect for capturing memories in style.',
            'starting_price' => 1000.00,
            'increment_percentage' => 5.00,
            'category_id' => 6,
            'user_id' => 1,
            'auction_end_time' => Carbon::now()->addDays(2),
        ]);

        Product::create([
            'name' => 'Globe',
            'description' => 'An antique globe, showcasing the world as it once was.',
            'starting_price' => 500.00,
            'increment_percentage' => 2.50,
            'category_id' => 8,
            'user_id' => 1,
            'auction_end_time' => Carbon::now()->addHours(12),
        ]);

        Product::create([
            'name' => 'Clock',
            'description' => 'A timeless clock that adds a touch of history to any space.',
            'starting_price' => 150.00,
            'increment_percentage' => 1.50,
            'category_id' => 7,
            'user_id' => 2,
            'auction_end_time' => Carbon::now()->addDays(1)->addHours(5),
        ]);

        Product::create([
            'name' => 'Telephone',
            'description' => 'A classic rotary telephone from the golden age of communication.',
            'starting_price' => 150.00,
            'increment_percentage' => 1.50,
            'category_id' => 5,
            'user_id' => 2,
            'auction_end_time' => Carbon::now()->addDays(1)->addHours(5),
        ]);

        Product::create([
            'name' => 'Camera',
            'description' => 'A vintage camera, perfect for capturing memories in style.',
            'starting_price' => 1000.00,
            'increment_percentage' => 5.00,
            'category_id' => 6,
            'user_id' => 1,
            'auction_end_time' => Carbon::now()->addDays(2),
        ]);

        Product::create([
            'name' => 'Microphone',
            'description' => 'A vintage microphone, perfect for classic music enthusiasts.',
            'starting_price' => 150.00,
            'increment_percentage' => 1.50,
            'category_id' => 8,
            'user_id' => 2,
            'auction_end_time' => Carbon::now()->addDays(1)->addHours(5),
        ]);

        Product::create([
            'name' => 'Binoculars',
            'description' => 'A pair of antique binoculars for exploring history.',
            'starting_price' => 500.00,
            'increment_percentage' => 2.50,
            'category_id' => 8,
            'user_id' => 1,
            'auction_end_time' => Carbon::now()->addHours(12),
        ]);

        Product::create([
            'name' => 'Camera',
            'description' => 'A rare vintage camera for photography enthusiasts.',
            'starting_price' => 150.00,
            'increment_percentage' => 1.50,
            'category_id' => 6,
            'user_id' => 2,
            'auction_end_time' => Carbon::now()->addDays(1)->addHours(5),
        ]);

        Product::create([
            'name' => 'Sewing Machine',
            'description' => 'A classic sewing machine, a timeless tool for crafting and repairs.',
            'starting_price' => 150.00,
            'increment_percentage' => 1.50,
            'category_id' => 8,
            'user_id' => 2,
            'auction_end_time' => Carbon::now()->addDays(1)->addHours(5),
        ]);


    }
}
