<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Domains\Desk\Models\Desk;
use App\Domains\Lists\Models\Lists;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Desk::factory()->count(10)->create()->each(function($c) {
            $c->lists()->saveMany(
                Lists::factory()->count(5)->make());
        });
    }
}
