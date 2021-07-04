<?php

namespace Database\Factories;

use App\Models\Creation;
use Illuminate\Database\Eloquent\Factories\Factory;

class CreationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Creation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slug' => $this->faker->slug(),
            'user_id' => rand(3, 7),
            'title' => $this->faker->sentence(3),
            'category' => $this->faker->sentence(1),
            'description' => $this->faker->paragraph(2),
        ];
    }
}
