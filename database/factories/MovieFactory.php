<?php

namespace Database\Factories;
use App\Models\Movie;
use App\Models\User;
use App\Models\Actor;
use App\Models\Director;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    protected $model = Movie::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        

       
        return [
            'title' => $this->faker->name(),
            'desc' => $this->faker->paragraph(),
            'release_date' => $this->faker->date(),
            'runtime' => $this->faker->time(),
            'quality' => $this->faker->randomElement(['hd', 'fullHD', '2k', '4k']),
            'type' => $this->faker->randomElement(['movie', 'tvshow']),
            'age' => $this->faker->numberBetween(0, 18),
            'cover' => 'nothumb.png',
            'back_photo' => 'nothumb_back.png',
            'source_link' => $this->faker->url(),
            'user_id' => User::factory(),
            
        ];
        
    }
}
