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
            'title' => $this->faker->sentence(3),
            'slug' => $this->faker->unique()->slug(1),
            'body' => collect($this->faker->paragraphs(mt_rand(5, 10)))->map(function ($p) {
                return "<p>$p</p>";
            })->implode(''),
            'user_id' => mt_rand(1, 4),
            'category_id' => mt_rand(1, 3),
        ];
    }
}
