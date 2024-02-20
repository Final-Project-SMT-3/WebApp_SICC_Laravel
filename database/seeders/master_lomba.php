<?php

namespace Database\Seeders;

use App\Models\Master_Lomba as ModelsMaster_Lomba;
use Illuminate\Database\Seeder;

class master_lomba extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsMaster_Lomba::insert([
            [
                'nama_lomba' => 'PKM',
                'created_at' => now()
            ],
            [
                'nama_lomba' => 'PILMAPRES',
                'created_at' => now()
            ],
            [
                'nama_lomba' => 'KMIPN',
                'created_at' => now()
            ],
            [
                'nama_lomba' => 'GEMASTIK',
                'created_at' => now()
            ]
        ]);
    }
}
