<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::withoutSyncingToSearch(function () {
            $total = 250_000;
            $chunkSize = 10_000;
            for ($i = 0; $i < $total; $i += $chunkSize) {
                Customer::factory()->count($chunkSize)->create();
            }
        });
    }
}
