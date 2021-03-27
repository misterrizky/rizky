<?php

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project = array(
            [
                'fid_client' => 9,
                'title' => 'SRC',
                'slug' => 'src',
                'description' => '
                    Perjalanan Kami Sebagai Toko Kelontong Masa Kini
                    Berawal dari 57 toko kelontong sederhana di kota Medan pada tahun 2008, dengan semangat untuk terus berkembang menjadi lebih baik, kami terus berusaha belajar dan bertransformasi menjadi Toko Kelontong Masa Kini yang bertujuan untuk dapat memenuhi kebutuhan setiap pelanggan Toko Kelontong SRC dan lingkungan sekitar, mulai dari kebutuhan pokok hingga kebutuhan produk digital.
                    Melalui semangat kebersamaan, kini kami menjadi Komunitas Toko Kelontong Masa Kini terbesar dengan lebih dari 120.000 toko kelontong yang tersebar di seluruh wilayah Indonesia. Kami tergabung dalam 6.000 Paguyuban SRC yang saling berbagi pengetahuan dan pengalaman untuk meningkatkan daya saing toko kelontong dan berkontribusi memajukan UMKM demi Indonesia yang lebih baik.
                ',
                'tags' => 'Mobile, Web, MySQL',
                'photo' => 'project/src.jpg',
                'uri' => 'https://www.src.id/',
                'is_active' => 'Y',
                'is_done' => 'Y'
            ],
            [
                'fid_client' => 7,
                'title' => 'EDODON',
                'slug' => 'edodon',
                'description' => '
                    Edodon adalah wadah untuk membaca dan menulis cerita dimanapun kamu berada. Tuangkan ide cerita kamu dan mulai membaca bersama teman-teman kamu di Edodon. Apresiasikan setiap bacaan dengan caramu bersama Edodon! Tunggu apa lagi, ayo mulai bergabung di Edodon sekarang!
                ',
                'tags' => 'Mobile, Web, PostgreSQL',
                'photo' => 'project/edodon.jpg',
                'uri' => '',
                'is_active' => 'Y',
                'is_done' => 'Y'
            ],
            [
                'fid_client' => 8,
                'title' => 'JAGOJEK',
                'slug' => 'jagojek',
                'description' => '
                    jagojek
                ',
                'tags' => 'Mobile, PostgreSQL',
                'photo' => 'project/jagojek.jpg',
                'uri' => 'https://www.jagojek.id/',
                'is_active' => 'Y',
                'is_done' => 'N'
            ],
            [
                'fid_client' => 2,
                'title' => 'Direktorat Bina Kerjasama dan Pemberdayaan',
                'slug' => 'direktorat-bina-kerjasama-pemberdayaan',
                'description' => '
                    
                ',
                'tags' => 'Web, MySQL',
                'photo' => 'project/djbk.jpg',
                'uri' => '',
                'is_active' => 'Y',
                'is_done' => 'Y'
            ],
            [
                'fid_client' => 2,
                'title' => 'Sistem Evaluasi Pelaksanaan Pengadaan Jasa Konstruksi',
                'slug' => 'sistem-evaluasi-pelaksanaan-pengadaan-jasa-konstruksi',
                'description' => '
                    
                ',
                'tags' => 'Web, MySQL',
                'photo' => 'project/seppjk.jpg',
                'uri' => '',
                'is_active' => 'Y',
                'is_done' => 'Y'
            ],
            [
                'fid_client' => 2,
                'title' => 'Sistem Informasi Pemaketan Jasa Konstruksi',
                'slug' => 'sistem-informasi-pemaketan-jasa-konstruksi',
                'description' => '
                    
                ',
                'tags' => 'Web, MySQL',
                'photo' => 'project/sipjk.jpg',
                'uri' => '',
                'is_active' => 'Y',
                'is_done' => 'Y'
            ],
            [
                'fid_client' => NULL,
                'title' => 'POS',
                'slug' => 'pos',
                'description' => '
                    
                ',
                'tags' => 'Web, PostgreSQL',
                'photo' => 'project/hocn.jpg',
                'uri' => '',
                'is_active' => 'Y',
                'is_done' => 'Y'
            ]
        );
        foreach($project AS $p){
            Project::create([
                'fid_client' => $p['fid_client'],
                'title' => $p['title'],
                'slug' => $p['slug'],
                'description' => $p['description'],
                'tags' => $p['tags'],
                'photo' => $p['photo'],
                'uri' => $p['uri'],
                'is_active' => $p['is_active'],
                'is_done' => $p['is_done']
            ]);
        }
    }
}
