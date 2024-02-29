<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\tWihoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelas;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Student::factory(30)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Kelas::create([
            'kelas_siswa' => '10 PPLG 1',
        ]);

        Kelas::create([
            'kelas_siswa' => '10 PPLG 2',
        ]);

        Kelas::create([
            'kelas_siswa' => '11 PPLG 1',
        ]);

        Kelas::create([
            'kelas_siswa' => '11 PPLG 2',
        ]);
    }
}
