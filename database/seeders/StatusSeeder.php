<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

/**
 * Status Seeder
 *
 * @class Database\Seeders\StatusSeeder
 * @package Database\Seeders
 */
class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            'pending',
            'approved',
            'declined',
        ];

        foreach ($statuses as $status) {
            Status::create([
                'name' => $status,
            ]);
        }
    }
}
