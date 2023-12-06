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
            ['id_alternatif' => 1, 'alternatif' => 'Amanda Nababan'],
            ['id_alternatif' => 2, 'alternatif' => 'Amita Nababan'],
            ['id_alternatif' => 3, 'alternatif' => 'Mores Nababan'],
            ['id_alternatif' => 4, 'alternatif' => 'Saritua Marpaung'],
            ['id_alternatif' => 5, 'alternatif' => 'Elsa Nababan'],
            ['id_alternatif' => 6, 'alternatif' => 'Hadi Saputra'],
            ['id_alternatif' => 7, 'alternatif' => 'Irfan Agus'],
            ['id_alternatif' => 8, 'alternatif' => 'Lestari Sibagariang'],
            ['id_alternatif' => 9, 'alternatif' => 'Josia Nababan'],
            ['id_alternatif' => 10, 'alternatif' => 'Irma Sianipar'],
            ['id_alternatif' => 11, 'alternatif' => 'Lamtiur Nababan'],
            ['id_alternatif' => 12, 'alternatif' => 'Rahul Nababan'],
            ['id_alternatif' => 13, 'alternatif' => 'Hosianna Nababan'],
            ['id_alternatif' => 14, 'alternatif' => 'Ester Nababan'],
            ['id_alternatif' => 15, 'alternatif' => 'Anwar Nababan'],
            ['id_alternatif' => 16, 'alternatif' => 'Morisca Sibagariang'],
            ['id_alternatif' => 17, 'alternatif' => 'Elfrida Sitinjak'],
            ['id_alternatif' => 18, 'alternatif' => 'Credo Nababan'],
            ['id_alternatif' => 19, 'alternatif' => 'Serdi Silitonga'],
            ['id_alternatif' => 20, 'alternatif' => 'Jelmanro Silitonga'],
        ];

        DB::table('alternatif')->insert($data);
    }
}
