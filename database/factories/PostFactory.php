<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reaction_count' => $this->faker->numberBetween(1,20),
            'views_count' => $this->faker->numberBetween(1,5),
            'comment_count' => $this->faker->numberBetween(1,10),
            'content' => $this->faker->text(),
            'user_id' => $this->faker->numberBetween(1,21)
        ];
    }
}
