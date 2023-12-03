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
            ['id' => 1, 'kriteria' => 'Kedisiplinan', 'atribut' => 'Benefit', 'bobot' => 0.200],
            ['id' => 2, 'kriteria' => 'Keaktifan', 'atribut' => 'Benefit', 'bobot' => 0.150],
            ['id' => 3, 'kriteria' => 'Total Penjualan', 'atribut' => 'Benefit', 'bobot' => 0.300],
            ['id' => 4, 'kriteria' => 'Jumlah Anggota', 'atribut' => 'Benefit', 'bobot' => 0.250],
            ['id' => 5, 'kriteria' => 'Kegigihan', 'atribut' => 'Benefit', 'bobot' => 0.150],
        ];

        DB::table('kriteria')->insert($data);
    }
}
