<?php

namespace Database\Seeders;

use App\Models\Classes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classes::create([
            'name' => '10 PPLG 1'
        ]);
        Classes::create([
            'name' => '10 PPLG 2'
        ]);
        Classes::create([
            'name' => '10 PPLG 3'
        ]);
    }
}
