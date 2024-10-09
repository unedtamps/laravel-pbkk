<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tailwindColors = collect(
            [
            'red-100', 'green-100', 'blue-100', 'yellow-100', 'purple-100', 'orange-100',
            'pink-100', 'gray-100', 'indigo-100', 'teal-100', 'cyan-100', 'emerald-100',
            'amber-100', 'lime-100', 'rose-100'
            ]
        );
        return [
          'name' => fake()->sentence(rand(1, 2), false),
            'slug' => Str::slug(fake()->sentence(rand(1, 2), false)),
            'color' => $tailwindColors->random()
        ];
    }
}
