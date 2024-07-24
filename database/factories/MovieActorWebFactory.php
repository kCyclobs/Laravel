<?php

namespace Database\Factories;
use App\Models\Movie;
use App\Models\Actor;
use App\Models\MovieActorWeb;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MovieActorWeb>
 */
class MovieActorWebFactory extends Factory
{
    protected $model = MovieActorWeb::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'actor_id' => Actor::factory(),
            'movie_id' => Movie::factory(),
            
        ];
    }
}
