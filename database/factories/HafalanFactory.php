<?php

namespace Database\Factories;

use App\Models\Hafalan;
use App\Models\Siswa;
use App\Models\Juz;
use App\Models\Surat;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class HafalanFactory extends Factory
{
    protected $model = Hafalan::class;

    public function definition(): array
    {
        return [
            'siswa_id' => Siswa::factory(),
            'juz_id' => Juz::factory(),
            'surat_id' => Surat::factory(),
            'pengajar_id' => User::factory(),
            'mulai_ayat' => $this->faker->numberBetween(1, 10),
            'akhir_ayat' => $this->faker->optional()->numberBetween(11, 20),
            'nilai' => $this->faker->randomElement(['Belum mampu', 'Cukup', 'Mampu']),
            'catatan' => $this->faker->optional()->sentence(),
        ];
    }
}
