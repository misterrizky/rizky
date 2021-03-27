<?php

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = array(
            [
                'name' => 'PT. Len Industri (Persero)',
                'slug' => 'pt-len-industri-persero',
                'photo' => 'clients/len.png',
                'is_active' => 'Y'
            ],
            [
                'name' => 'Kementerian Pekerjaan Umum dan Perumahan Rakyat Republik Indonesia',
                'slug' => 'kementrian-pekerjaan-umum-dan-perumahan-rakyat-republik-indonesia',
                'photo' => 'clients/pu.jpg',
                'is_active' => 'Y'
            ],
            [
                'name' => 'Institut Teknologi Nasional Bandung',
                'slug' => 'institut-teknologi-nasional-bandung',
                'photo' => 'clients/itenas.png',
                'is_active' => 'Y'
            ],
            [
                'name' => 'Universitas Kebangsaan',
                'slug' => 'universitas-kebangsaan',
                'photo' => 'clients/uk.png',
                'is_active' => 'N'
            ],
            [
                'name' => 'Kementerian Kelautan dan Perikanan Republik Indonesia',
                'slug' => 'kementerian-kelautan-dan-rerikanan-republik-indonesia',
                'photo' => 'clients/kkp.png',
                'is_active' => 'Y'
            ],
            [
                'name' => 'PT. Perkebunan Sumatera Utara',
                'slug' => 'pt-perkebunan-sumatera-utara',
                'photo' => 'clients/psu.png',
                'is_active' => 'Y'
            ],
            [
                'name' => 'EDODON',
                'slug' => 'edodon',
                'photo' => 'clients/edodon.png',
                'is_active' => 'Y'
            ],
            [
                'name' => 'JAGOJEK',
                'slug' => 'jagojek',
                'photo' => 'clients/jagojek.png',
                'is_active' => 'Y'
            ],
            [
                'name' => 'SRC',
                'slug' => 'src',
                'photo' => 'clients/src.svg',
                'is_active' => 'Y'
            ]
        );
        foreach($client AS $c){
            Client::create([
                'name' => $c['name'],
                'slug' => $c['slug'],
                'photo' => $c['photo'],
                'is_active' => $c['is_active']
            ]);
        }
    }
}
