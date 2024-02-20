<?php

namespace Database\Seeders;

use App\Models\Master_Detail_Lomba as ModelsMaster_Detail_Lomba;
use Illuminate\Database\Seeder;

class master_detail_lomba extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsMaster_Detail_Lomba::insert([
            [
                'id_mst_lomba' => 1,
                'detail_lomba' => 'Program Kreativitas Mahasiswa adalah kegiatan untuk meningkatkan mutu peserta didik (mahasiswa) di perguruan tinggi agar kelak dapat menjadi anggota masyarakat yang memiliki kemampuan akademis dan/atau profesional yang dapat menerapkan, mengembangkan dan meyebarluaskan ilmu pengetahuan, teknologi dan/atau kesenian serta memperkaya budaya nasional.',
                'created_at' => now()
            ],
            [
                'id_mst_lomba' => 2,
                'detail_lomba' => 'Program bergengsi rutin tahunan yang diselenggarakan oleh Kementerian Pendidikan dan Kebudayaan yang diikuti oleh berbagai Perguruan Tinggi di Indonesia.',
                'created_at' => now()
            ],
            [
                'id_mst_lomba' => 3,
                'detail_lomba' => 'Kompetisi Mahasiswa Informatika Politeknik Nasional (KMIPN) merupakan ajang bergengsi untuk Politeknik se-Indonesia di bidang Informatika.',
                'created_at' => now()
            ],
            [
                'id_mst_lomba' => 4,
                'detail_lomba' => 'GemasTIK adalah Pagelaran Mahasiswa Nasional Bidang Teknologi Informasi dan Komunikasi yang diadakan oleh Kementerian Riset, Teknologi, dan Pendidikan Tinggi Republik Indonesia. GemasTIK bertujuan untuk mengembangkan potensi mahasiswa di bidang TIK dan menyatukan visi, misi, dan karya mahasiswa Indonesia di tingkat nasional . GemasTIK memiliki berbagai kategori lomba seperti game development, keamanan siber, penambangan data, desain pengalaman pengguna, karya tulis ilmiah, dan lain-lain',
                'created_at' => now()
            ],
        ]);
    }
}
