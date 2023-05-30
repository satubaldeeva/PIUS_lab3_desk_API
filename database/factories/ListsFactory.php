<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lists>
 */
class ListsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'desk_id' => function () {
                return $this->factory(App\Models\Desk::class)->create()->id;
            },
            'name' => $this->faker->word,
            'description' => $this->faker->text,
            'created_at' =>$this->faker->dateTimeBetween('now','+30 weeks'),
        ];
    }
}
