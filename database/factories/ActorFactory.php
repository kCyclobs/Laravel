<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Actor;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Actor>
 */
class ActorFactory extends Factory
{
    protected $model = Actor::class;
    /**
     * 
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'actor_name' => $this->faker->name(),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'age' => $this->faker->numberBetween(20, 70),
            'Date_of_Birth' => $this->faker->date(),
            'Nationality' => $this->faker->country(),
            'occupation' => $this->faker->randomElement(['Actor', 'Actress']),
            'photo' => 'actor/bg.jpg',
        ];
    }
}
