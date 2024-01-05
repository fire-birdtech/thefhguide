<?php

namespace Database\Factories;

use App\Models\InfoPage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;

/**
 * @extends Factory<InfoPage>
 */
class InfoPageFactory extends Factory
{
    use WithFaker;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => Str::title($this->faker->words(3, true))
        ];
    }
}
