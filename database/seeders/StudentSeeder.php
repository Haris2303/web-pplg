<?php

namespace Database\Seeders;

use App\Models\Classes;
use App\Models\Force;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $class = Classes::first();
        $force = Force::first();

        $user = \App\Models\User::factory()->create([
            'name' => 'Surya Strong',
            'email' => 'surya@localhost',
            'password' => Hash::make('surya'),
            'role' => 'student'
        ]);

        Student::create([
            'nis' => '654345',
            'nisn' => '9752346543',
            'gender' => 'L',
            'birth' => '2001-12-02',
            'address' => 'Jalan Semangka',
            'religion' => 'Islam',
            'mother' => '-',
            'father' => '-',
            'user_id' => $user->id,
            'class_id' => $class->id,
            'force_id' => $force->id
        ]);
    }
}
