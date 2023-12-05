<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id' => 1, 'alternatif' => 'Amanda Nababan'],
            ['id' => 2, 'alternatif' => 'Amita Nababan'],
            ['id' => 3, 'alternatif' => 'Mores Nababan'],
            ['id' => 4, 'alternatif' => 'Saritua Marpaung'],
            ['id' => 5, 'alternatif' => 'Elsa Nababan'],
            ['id' => 6, 'alternatif' => 'Hadi Saputra'],
            ['id' => 7, 'alternatif' => 'Irfan Agus'],
            ['id' => 8, 'alternatif' => 'Lestari Sibagariang'],
            ['id' => 9, 'alternatif' => 'Josia Nababan'],
            ['id' => 10, 'alternatif' => 'Irma Sianipar'],
            ['id' => 11, 'alternatif' => 'Lamtiur Nababan'],
            ['id' => 12, 'alternatif' => 'Rahul Nababan'],
            ['id' => 13, 'alternatif' => 'Hosianna Nababan'],
            ['id' => 14, 'alternatif' => 'Ester Nababan'],
            ['id' => 15, 'alternatif' => 'Anwar Nababan'],
            ['id' => 16, 'alternatif' => 'Morisca Sibagariang'],
            ['id' => 17, 'alternatif' => 'Elfrida Sitinjak'],
            ['id' => 18, 'alternatif' => 'Credo Nababan'],
            ['id' => 19, 'alternatif' => 'Serdi Silitonga'],
            ['id' => 20, 'alternatif' => 'Jelmanro Silitonga'],
        ];

        DB::table('alternatif')->insert($data);
    }
}
