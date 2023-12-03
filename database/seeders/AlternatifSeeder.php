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
            ['id' => 1, 'alternatif' => 'Alfian'],
            ['id' => 2, 'alternatif' => 'Reza'],
            ['id' => 3, 'alternatif' => 'Vicky'],
            ['id' => 4, 'alternatif' => 'Hilmi'],
            ['id' => 5, 'alternatif' => 'Oscar'],
        ];

        DB::table('alternatif')->insert($data);
    }
}
