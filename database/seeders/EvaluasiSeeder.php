<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EvaluasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [1, 1, 4], [1, 2, 3], [1, 3, 4], [1, 4, 1], [1, 5, 5],
            [2, 1, 4], [2, 2, 3], [2, 3, 4], [2, 4, 2], [2, 5, 3],
            [3, 1, 2], [3, 2, 5], [3, 3, 4], [3, 4, 4], [3, 5, 5],
            [4, 1, 5], [4, 2, 3], [4, 3, 3], [4, 4, 2], [4, 5, 3],
            [5, 1, 2], [5, 2, 4], [5, 3, 4], [5, 4, 4], [5, 5, 5],
        ];

        foreach ($data as $row) {
            DB::table('evaluasi')->insert([
                'id_alternatif' => $row[0],
                'id_kriteria' => $row[1],
                'nilai' => $row[2],
            ]);
        }
    }
}
