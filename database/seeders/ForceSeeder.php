<?php

namespace Database\Seeders;

use App\Models\Force;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ForceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Force::create([
            'year' => '2019'
        ]);
    }
}
