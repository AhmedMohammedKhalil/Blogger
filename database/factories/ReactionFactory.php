<?php

namespace Database\Factories;

use App\Models\Reaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reactionable_id' => $this->faker->numberBetween(1,20),
            'by' => $this->faker->numberBetween(1,20),
            'reactionable_type' => 'post'
        ];
    }
}
