<?php

namespace Database\Factories;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    protected $model = Siswa::class;

    public function definition()
    {
        return [
            'nama' => $this->faker->name,
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'kelas' => $this->faker->randomElement(['TKA', 'TPA', 'TQA']),
        ];
    }
}
