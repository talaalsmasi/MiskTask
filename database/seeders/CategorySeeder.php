<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['name' => 'Speakers', 'description' => 'Vintage speakers and sound systems from the past.']);
        Category::create(['name' => 'Radio', 'description' => 'Classic radios and antique communication devices.']);
        Category::create(['name' => 'TV', 'description' => 'Retro TVs and old-school entertainment systems.']);
        Category::create(['name' => 'Typewriters', 'description' => 'Classic typewriters and writing instruments.']);
        Category::create(['name' => 'Telephone', 'description' => 'Antique telephones and historical communication tools.']);
        Category::create(['name' => 'Camera', 'description' => 'Vintage cameras and photography equipment.']);
        Category::create(['name' => 'Clock', 'description' => 'Antique clocks and timeless pieces.']);
        Category::create(['name' => 'Other', 'description' => 'Miscellaneous vintage and rare items.']);

    }
}
