<?php

namespace Database\Factories;

use App\Domains\Lists\Models\Lists;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Domains\Lists\Models\Lists>
 */
class ListsFactory extends Factory
{
    protected $model = Lists::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'desk_id' => $this->faker->numberBetween(1),
            'name' => $this->faker->word,
            'description' => $this->faker->text,
        ];
    }
}
