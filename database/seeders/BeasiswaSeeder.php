<?php

namespace Database\Seeders;

use App\Models\Beasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Beasiswa::create([
            'name' => 'Beasiswa Akademik',
            'deskripsi' => 'Program Beasiswa Pendidikan adalah program beasiswa yang diberikan kepada mahasiswa yang memiliki prestasi akademik yang baik.',
        ]);
        Beasiswa::create([
            'name' => 'Beasiswa Non Akademik',
            'deskripsi' => 'Program Beasiswa Pendidikan adalah program beasiswa yang diberikan kepada mahasiswa yang memiliki prestasi akademik yang baik.',
        ]);
        Beasiswa::create([
            'name' => 'Beasiswa Kedinasan',
            'deskripsi' => 'Program Beasiswa Pendidikan adalah program beasiswa yang diberikan kepada mahasiswa yang memiliki prestasi akademik yang baik.',
        ]);
    }
}
