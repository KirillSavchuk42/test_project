<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

/**
 * Country Seeder
 *
 * @class Database\Seeders\CountrySeeder
 * @package Database\Seeders
 */
class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::factory(10)->create();
    }
}
