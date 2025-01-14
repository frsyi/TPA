<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            JuzSeeder::class,
            SuratSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Pengurus',
            'username' => 'admin',
            'password' => Hash::make('superadmin'),
            'role' => User::ROLE_PENGURUS,
        ]);
    }
}
