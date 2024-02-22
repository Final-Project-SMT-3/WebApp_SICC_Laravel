<?php

namespace Database\Seeders;

use App\Models\Master_Dospem;
use Illuminate\Database\Seeder;

class DospemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Master_Dospem::insert([
            [
                'nidn' => '0019057403',
                'nama_dosen' => 'Aji Seto Arifianto, S.ST., M.T.',
                'email' => 'ajiseto@polije.ac.id',
                'created_at' => now()
            ],
            [
                'nidn' => '0008047103',
                'nama_dosen' => 'Wahyu Kurnia Dewanto, S.Kom, M.T.',
                'email' => 'wahyu.k.dewanto@gmail.com',
                'created_at' => now()
            ],
            [
                'nidn' => '0019057403',
                'nama_dosen' => 'Nugroho Setyo Wibowo, S.T., M.T.',
                'email' => 'nugroho@polije.ac.id',
                'created_at' => now()
            ],
            [
                'nidn' => '0010078903',
                'nama_dosen' => 'Ery Setiyawan Jullev Atmadji, S.Kom., M.Cs.',
                'email' => 'ery@polije.ac.id',
                'created_at' => now()
            ],
        ]);
    }
}
