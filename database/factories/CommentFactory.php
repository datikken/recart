<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Comment;
use App\Models\User;
use App\Models\Post;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

//    Comment::factory(3)->create(['parent_id' => null]);

    public function definition()
    {
        return [
            'body' => $this->faker->sentence(10),
            'user_id' => self::factoryForModel(User::class)->create()->id,
            'post_id' => self::factoryForModel(Post::class)->create()->id
        ];
    }
}
