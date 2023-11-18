<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(3, true),
            'published' => fake()->boolean,
            'slug' => fake()->slug,
            'author_id' => User::factory(),
            'blocks' => get_fixture('page_blocks.json'),
        ];
    }

    public function published()
    {
        return $this->state(function (array $attributes) {
            return [
                'published' => true,
            ];
        });
    }

    /**
     * Configure the model factory.
     */
    public function configure(): static
    {
        return $this->afterMaking(function (Page $page) {
            // ...
        })->afterCreating(function (Page $page) {
            $page->attachTags([fake()->word, fake()->word]);
        });
    }
}
