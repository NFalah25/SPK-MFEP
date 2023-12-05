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
            ['id' => 1, 'kriteria' => 'Nilai rata-rata raport', 'atribut' => 'Benefit', 'bobot' => 16],
            ['id' => 2, 'kriteria' => 'Ekstrakurikuler', 'atribut' => 'Benefit', 'bobot' => 14],
            ['id' => 3, 'kriteria' => 'Keaktifan', 'atribut' => 'Benefit', 'bobot' => 8],
            ['id' => 4, 'kriteria' => 'Keterampilan', 'atribut' => 'Benefit', 'bobot' => 13],
            ['id' => 5, 'kriteria' => 'Kepribadian', 'atribut' => 'Benefit', 'bobot' => 7],
            ['id' => 6, 'kriteria' => 'Kedisiplinan', 'atribut' => 'Benefit', 'bobot' => 12],
            ['id' => 7, 'kriteria' => 'Sikap', 'atribut' => 'Benefit', 'bobot' => 9],
            ['id' => 8, 'kriteria' => 'Sertifikat prestasi', 'atribut' => 'Benefit', 'bobot' => 6],
            ['id' => 9, 'kriteria' => 'Tanggung jawab', 'atribut' => 'Benefit', 'bobot' => 5],
            ['id' => 10, 'kriteria' => 'Absen', 'atribut' => 'Cost', 'bobot' => 10],
        ];

        DB::table('kriteria')->insert($data);
    }
}
