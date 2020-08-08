<?php

use Illuminate\Database\Seeder;
use App\ListAim;
use App\ListPnp;
use App\ListKepimpinan;
use App\ListKeusahawanan;

class LoockupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pnp = [            
            ['id' => 1, 'code' => 'PI 1', 'title' => 'Peratusan graduan bergraduat dengan CGPA 3.5 ke atas'],
            ['id' => 2, 'code' => 'PI 6', 'title' => 'Jumlah Pengambilan pelajar separuh masa (Misi Akademik)'],
        ];

        $aim = [            
            ['id' => 1, 'code' => 'PI 32', 'title' => 'Bilangan staf akademik dan mahasiswa yang terlibat dalam program cross fertilization'],
            ['id' => 2, 'code' => 'PI 33', 'title' => 'Bilangan graduan yang terlibat dalam Bumiputera Commercial and Industrial Community (BCIC)'],
            ['id' => 3, 'code' => 'PI 40', 'title' => 'Bilangan mahasiswa terpilih yang terlibat dengan program kolaborasi bersama industri'],
            ['id' => 4, 'code' => 'PI 41', 'title' => 'Bilangan mahasiswa yang disangkutkan di industri antarabangsa'],
            ['id' => 5, 'code' => 'PI 42', 'title' => 'Bilangan MOU/MOA dengan industri atau universiti antarabangsa'],
            ['id' => 6, 'code' => 'PI 43', 'title' => 'Bilangan program kesukarelawanan mahasiswa secara kolaborasi bersama industri'],
            ['id' => 7, 'code' => '', 'title' => 'Bilangan amalam terbaik dalam pemindahan ilmu yang diterima pakai oleh komuniti dan inovasi yang diterima oleh industri/komuniti'],
            ['id' => 8, 'code' => '', 'title' => 'Bilangan program kesukarelawanan mahasiswa secara kolaborasi bersama masyarakat'],
            ['id' => 9, 'code' => '', 'title' => 'Bilangan program khidmat kesepakaran mahasiswa-masyarakat yang dianjurkan setahun'],
            ['id' => 10, 'code' => '', 'title' => 'Bilangan Jaringan Bestari dengan Alumni UiTM'],
            ['id' => 11, 'code' => '', 'title' => 'Bilangan jalinan program kerjasama dengan industri'],
        ];

        $kepimpinan = [            
            ['id' => 1, 'code' => 'PI 46', 'title' => 'Bilangan mahasiswa terpilih dan terlibat dengan program mobiliti ke universiti luar negara'],
            ['id' => 2, 'code' => 'PI 47', 'title' => 'Bilangan penganjuran program berteraskan University Community Engagement (UCE)'],
        ];

        $keusahawanan = [            
            ['id' => 1, 'code' => 'PI 49', 'title' => 'Bilangan Mahasiswa yang menjadi usahawan berdaftar dengan Suruhanjaya Syarikat Malaysia (SSM)'],
            ['id' => 2, 'code' => 'PI 50', 'title' => 'Bilangan pelajar ijazah pertama dan diploma sepenuh masa (tidak termasuk pascasiswazah) terlibat dalam aktiviti pendedahan/pembudayaan keusahawanan selain daripada kokurikulum'],
        ];

        foreach ($pnp as $pnpItem) {
            ListPnp::updateOrCreate(['id' => $pnpItem['id']], $pnpItem);
        }
        foreach ($aim as $aimItem) {
            ListAim::updateOrCreate(['id' => $aimItem['id']], $aimItem);
        }
        foreach ($kepimpinan as $kepimpinanItem) {
            ListKepimpinan::updateOrCreate(['id' => $kepimpinanItem['id']], $kepimpinanItem);
        }
        foreach ($keusahawanan as $keusahawananItem) {
            ListKeusahawanan::updateOrCreate(['id' => $keusahawananItem['id']], $keusahawananItem);
        }
    }
}
