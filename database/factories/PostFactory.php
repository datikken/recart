<?php

namespace Database\Factories;

use App\Models\Post;
use Carbon\Carbon;
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
            'id' => $this->faker->unique()->uuid,
            'category' => $this->faker->word(),
            'heading' => $this->faker->word(),
            'description' => $this->faker->word(),
            'content' => $this->faker->word(),
            'user_id' => $this->faker->word(),
            'created_at' => Carbon::now()
        ];
    }
}
