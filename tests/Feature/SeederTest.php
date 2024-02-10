<?php

namespace Tests\Feature;

use Database\Seeders\ClassesSeeder;
use Database\Seeders\ForceSeeder;
use Database\Seeders\SubjectSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SeederTest extends TestCase
{
    public function testRunSeeder()
    {
        $this->seed([ClassesSeeder::class, ForceSeeder::class, SubjectSeeder::class]);
        $this->assertTrue(true);
    }
}
