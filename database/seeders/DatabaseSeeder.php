<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Desk;
use App\Models\Lists;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Desk::factory(10)->create()->each(function($c) {
            /** @var \App\Models\Desk $c */
            $c->lists()->saveMany(
                Lists::factory(5)->create(['desk_id' => $c->id])
            );
        });
    }
}
