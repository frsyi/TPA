<?php

namespace Database\Factories;

use App\Models\Juz;
use Illuminate\Database\Eloquent\Factories\Factory;

class JuzFactory extends Factory
{
    protected $model = Juz::class;

    public function definition(): array
    {
        return [
            'juz' => $this->faker->unique()->numberBetween(1, 30),
        ];
    }
}
