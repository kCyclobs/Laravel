<?php

namespace Database\Factories;
use App\Models\Movie;
use App\Models\Director;
use App\Models\MovieDirectorWeb;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MovieDirectorWeb>
 */
class MovieDirectorWebFactory extends Factory
{
    protected $model = MovieDirectorWeb::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'director_id' => Director::factory(),
            'movie_id' => Movie::factory(),
        ];
    }
}
