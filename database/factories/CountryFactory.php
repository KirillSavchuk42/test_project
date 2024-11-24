<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Country Factory
 *
 * @class Database\Factories\CountryFactory
 * @package Database\Factories
 */
class CountryFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Country::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->country,
        ];
    }
}
