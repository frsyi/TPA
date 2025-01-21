<?php

namespace Database\Factories;

use App\Models\ActivityLog;
use App\Models\User;
use App\Models\Hafalan;
use App\Models\Iqra;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityLogFactory extends Factory
{
    protected $model = ActivityLog::class;

    public function definition()
    {
        return [
            'pengajar_id' => User::factory(),
            'activity' => $this->faker->randomElement([
                'Menambah data iqra',
                'Mengubah data iqra',
                'Menghapus data iqra',
                'Menambah data hafalan',
                'Mengubah data hafalan',
                'Menghapus data hafalan'
            ]),
            'hafalan_id' => Hafalan::factory()->create()->id,
            'iqra_id' => Iqra::factory()->create()->id,
        ];
    }
}
