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
            [1, 1, 5], [1, 2, 5], [1, 3, 5], [1, 4, 4], [1, 5, 5], [1, 6, 5], [1, 7, 5], [1, 8, 4], [1, 9, 5], [1, 10, 4],
            [2, 1, 5], [2, 2, 5], [2, 3, 4], [2, 4, 4], [2, 5, 4], [2, 6, 4], [2, 7, 5], [2, 8, 4], [2, 9, 5], [2, 10, 4],
            [3, 1, 4], [3, 2, 5], [3, 3, 4], [3, 4, 5], [3, 5, 4], [3, 6, 4], [3, 7, 5], [3, 8, 3], [3, 9, 5], [3, 10, 4],
            [4, 1, 5], [4, 2, 5], [4, 3, 5], [4, 4, 5], [4, 5, 5], [4, 6, 5], [4, 7, 5], [4, 8, 4], [4, 9, 5], [4, 10, 5],
            [5, 1, 4], [5, 2, 5], [5, 3, 4], [5, 4, 4], [5, 5, 4], [5, 6, 5], [5, 7, 5], [5, 8, 3], [5, 9, 5], [5, 10, 5],
            [6, 1, 4], [6, 2, 4], [6, 3, 4], [6, 4, 5], [6, 5, 3], [6, 6, 4], [6, 7, 4], [6, 8, 2], [6, 9, 4], [6, 10, 5],
            [7, 1, 4], [7, 2, 4], [7, 3, 4], [7, 4, 5], [7, 5, 4], [7, 6, 4], [7, 7, 4], [7, 8, 3], [7, 9, 5], [7, 10, 5],
            [8, 1, 4], [8, 2, 4], [8, 3, 4], [8, 4, 4], [8, 5, 3], [8, 6, 4], [8, 7, 4], [8, 8, 2], [8, 9, 4], [8, 10, 4],
            [9, 1, 4], [9, 2, 4], [9, 3, 4], [9, 4, 4], [9, 5, 5], [9, 6, 5], [9, 7, 5], [9, 8, 4], [9, 9, 4], [9, 10, 5],
            [10, 1, 4], [10, 2, 5], [10, 3, 4], [10, 4, 4], [10, 5, 3], [10, 6, 4], [10, 7, 4], [10, 8, 3], [10, 9, 4], [10, 10, 5],
            [11, 1, 4], [11, 2, 4], [11, 3, 3], [11, 4, 3], [11, 5, 4], [11, 6, 4], [11, 7, 4], [11, 8, 2], [11, 9, 4], [11, 10, 4],
            [12, 1, 4], [12, 2, 3], [12, 3, 4], [12, 4, 4], [12, 5, 3], [12, 6, 4], [12, 7, 4], [12, 8, 2], [12, 9, 4], [12, 10, 4],
            [13, 1, 4], [13, 2, 4], [13, 3, 4], [13, 4, 3], [13, 5, 3], [13, 6, 3], [13, 7, 4], [13, 8, 2], [13, 9, 5], [13, 10, 4],
            [14, 1, 4], [14, 2, 3], [14, 3, 4], [14, 4, 4], [14, 5, 3], [14, 6, 4], [14, 7, 4], [14, 8, 2], [14, 9, 4], [14, 10, 3],
            [15, 1, 3], [15, 2, 3], [15, 3, 3], [15, 4, 3], [15, 5, 4], [15, 6, 4], [15, 7, 4], [15, 8, 1], [15, 9, 3], [15, 10, 4],
            [16, 1, 3], [16, 2, 3], [16, 3, 4], [16, 4, 3], [16, 5, 3], [16, 6, 3], [16, 7, 4], [16, 8, 1], [16, 9, 4], [16, 10, 4],
            [17, 1, 3], [17, 2, 4], [17, 3, 4], [17, 4, 4], [17, 5, 3], [17, 6, 3], [17, 7, 4], [17, 8, 3], [17, 9, 4], [17, 10, 5],
            [18, 1, 3], [18, 2, 3], [18, 3, 4], [18, 4, 3], [18, 5, 4], [18, 6, 3], [18, 7, 4], [18, 8, 2], [18, 9, 3], [18, 10, 3],
            [19, 1, 3], [19, 2, 2], [19, 3, 3], [19, 4, 3], [19, 5, 3], [19, 6, 4], [19, 7, 3], [19, 8, 1], [19, 9, 3], [19, 10, 3],
            [20, 1, 3], [20, 2, 3], [20, 3, 2], [20, 4, 3], [20, 5, 3], [20, 6, 3], [20, 7, 3], [20, 8, 2], [20, 9, 3], [20, 10, 3],
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
