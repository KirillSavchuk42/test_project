<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

/**
 * Category Seeder
 *
 * @class Database\Seeders\CategorySeeder
 * @package Database\Seeders
 */
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Category::factory(10)->create();
        $staticCategories = [
            'Dooley-Zieme',
            'Yundt LLC',
            'Fisher LLC',
            'Abernathy, Heidenreich and Little',
            'Herzog-Konopelski',
            'Bayer LLC',
            'Rohan and Sons',
            'Anderson Ltd',
            'Corkery Inc',
            'Reynolds Ltd',
        ];

        foreach ($staticCategories as $category) {
            Category::create([
                'name' => $category,
            ]);
        }
    }
}
