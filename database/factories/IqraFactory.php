<?php

namespace Database\Factories;

use App\Models\Iqra;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class IqraFactory extends Factory
{
    protected $model = Iqra::class;

    public function definition(): array
    {
        return [
            'siswa_id' => Siswa::factory(),
            'pengajar_id' => User::factory(),
            'jilid' => $this->faker->numberBetween(1, 6),
            'halaman' => $this->faker->numberBetween(1, 50),
            'nilai' => $this->faker->randomElement(['Belum mampu', 'Cukup', 'Mampu']),
            'catatan' => $this->faker->optional()->sentence(),
        ];
    }
}
