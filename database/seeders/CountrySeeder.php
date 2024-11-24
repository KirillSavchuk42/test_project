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
        //Country::factory(10)->create();
        $staticCountries = [
            'France',
            'Sri Lanka',
            'China',
            'Brunei Darussalam',
            'Mauritania',
            'Venezuela',
            'Saint Pierre and Miquelon',
            'Equatorial Guinea',
            'San Marino',
            'Saint Lucia',
        ];

        foreach ($staticCountries as $country) {
            Country::create([
                'name' => $country,
            ]);
        }
    }
}
