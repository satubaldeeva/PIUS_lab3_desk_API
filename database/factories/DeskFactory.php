<?php

namespace Database\Factories;

use App\Domains\Desk\Models\Desk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Domains\Desk\Models\Desk>
 */
class DeskFactory extends Factory
{
    protected $model = Desk::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
        ];
    }
}
