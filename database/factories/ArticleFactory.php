<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'category_id' => Category::inRandomOrder()->first(),
            'user_id' => User::first(),
            'active' => $this->faker->randomElement([true,false]),
            'thumbnail_path' => 'public/thumbnails/default.jpg',
            'content' => $this->faker->realText(65000)
        ];
    }
}
