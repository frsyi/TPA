<?php

namespace Database\Seeders;

use App\Models\Juz;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JuzSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $juzs = [
            ['juz' => 1],
            ['juz' => 2],
            ['juz' => 3],
            ['juz' => 4],
            ['juz' => 5],
            ['juz' => 6],
            ['juz' => 7],
            ['juz' => 8],
            ['juz' => 9],
            ['juz' => 10],
            ['juz' => 11],
            ['juz' => 12],
            ['juz' => 13],
            ['juz' => 14],
            ['juz' => 15],
            ['juz' => 16],
            ['juz' => 17],
            ['juz' => 18],
            ['juz' => 19],
            ['juz' => 20],
            ['juz' => 21],
            ['juz' => 22],
            ['juz' => 23],
            ['juz' => 24],
            ['juz' => 25],
            ['juz' => 26],
            ['juz' => 27],
            ['juz' => 28],
            ['juz' => 29],
            ['juz' => 30],
        ];

        foreach ($juzs as $juz) {
            Juz::create($juz);
        }
    }
}
