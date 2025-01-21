<?php

namespace Database\Factories;

use App\Models\Surat;
use App\Models\Juz;
use Illuminate\Database\Eloquent\Factories\Factory;

class SuratFactory extends Factory
{
    protected $model = Surat::class;

    public function definition(): array
    {
        return [
            'juz_id' => Juz::factory(),
            'nama_surat' => $this->faker->unique()->word(),
            'mulai_ayat' => $this->faker->numberBetween(1, 286),
            'akhir_ayat' => $this->faker->numberBetween(1, 286),
        ];
    }
}
