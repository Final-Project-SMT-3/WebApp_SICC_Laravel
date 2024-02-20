<?php

namespace Database\Seeders;

use App\Models\Pelaksanaan_Lomba as ModelsPelaksanaan_Lomba;
use Illuminate\Database\Seeder;

class pelaksanaan_lomba extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsPelaksanaan_Lomba::insert([
            [
                'id_mst_lomba' => 1,
                'tanggal' => now(),
                'info' => 'PKM-KI',
                'status' => 'Soon',
                'created_at' => now()
            ],
            [
                'id_mst_lomba' => 2,
                'tanggal' => now(),
                'info' => 'PILMAPRES',
                'status' => 'Soon',
                'created_at' => now()
            ],
            [
                'id_mst_lomba' => 3,
                'tanggal' => now(),
                'info' => 'Hackthon',
                'status' => 'Soon',
                'created_at' => now()
            ],  
            [
                'id_mst_lomba' => 4,
                'tanggal' => now(),
                'info' => 'Keamanan Siber',
                'status' => 'Soon',
                'created_at' => now()
            ]
        ]);
    }
}
