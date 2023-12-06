<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id_kriteria' => 1, 'kriteria' => 'Nilai rata-rata raport', 'atribut' => 'Benefit', 'bobot' => 16],
            ['id_kriteria' => 2, 'kriteria' => 'Ekstrakurikuler', 'atribut' => 'Benefit', 'bobot' => 14],
            ['id_kriteria' => 3, 'kriteria' => 'Keaktifan', 'atribut' => 'Benefit', 'bobot' => 8],
            ['id_kriteria' => 4, 'kriteria' => 'Keterampilan', 'atribut' => 'Benefit', 'bobot' => 13],
            ['id_kriteria' => 5, 'kriteria' => 'Kepribadian', 'atribut' => 'Benefit', 'bobot' => 7],
            ['id_kriteria' => 6, 'kriteria' => 'Kedisiplinan', 'atribut' => 'Benefit', 'bobot' => 12],
            ['id_kriteria' => 7, 'kriteria' => 'Sikap', 'atribut' => 'Benefit', 'bobot' => 9],
            ['id_kriteria' => 8, 'kriteria' => 'Sertifikat prestasi', 'atribut' => 'Benefit', 'bobot' => 6],
            ['id_kriteria' => 9, 'kriteria' => 'Tanggung jawab', 'atribut' => 'Benefit', 'bobot' => 5],
            ['id_kriteria' => 10, 'kriteria' => 'Absen', 'atribut' => 'Cost', 'bobot' => 10],
        ];

        DB::table('kriteria')->insert($data);
    }
}
