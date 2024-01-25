<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subject::create([
            'name' => 'Basis Data'
        ]);
        Subject::create([
            'name' => 'Pemrograman Berorientasi Object'
        ]);
        Subject::create([
            'name' => 'Pemrograman Web'
        ]);
        Subject::create([
            'name' => 'Bahasa Indonesia'
        ]);
        Subject::create([
            'name' => 'Bahasa Inggris'
        ]);
        Subject::create([
            'name' => 'Agama'
        ]);
        Subject::create([
            'name' => 'PPKN'
        ]);
        Subject::create([
            'name' => 'Matematika'
        ]);
        Subject::create([
            'name' => 'PKK'
        ]);
        Subject::create([
            'name' => 'Algoritma Pemrograman Dasar'
        ]);
    }
}
