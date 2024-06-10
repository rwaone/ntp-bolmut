<?php

namespace Database\Seeders;

use App\Models\Desa;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DesaSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $desas = collect(array(
      array(
        'kode_kec' => '010',
        'code' => '001',
        'name' => 'SANGTOMBOLANG',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '010',
        'code' => '002',
        'name' => 'SAMPIRO',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '010',
        'code' => '003',
        'name' => 'SANGKUB I',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '010',
        'code' => '004',
        'name' => 'SANGKUB II',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '010',
        'code' => '005',
        'name' => 'SANGKUB III',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '010',
        'code' => '006',
        'name' => 'TOMBOLANGO',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '010',
        'code' => '007',
        'name' => 'BUSISINGO',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '010',
        'code' => '008',
        'name' => 'PANGKUSA',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '010',
        'code' => '009',
        'name' => 'SIDODADI',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '010',
        'code' => '010',
        'name' => 'BUSISINGO UTARA',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '010',
        'code' => '011',
        'name' => 'SANGKUB IV',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '010',
        'code' => '012',
        'name' => 'APENG SEMBEKA',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '010',
        'code' => '013',
        'name' => 'SANGKUB TIMUR',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '010',
        'code' => '014',
        'name' => 'MONOMPIA',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '010',
        'code' => '015',
        'name' => 'SUKA MAKMUR',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '010',
        'code' => '016',
        'name' => 'MOKUSATO',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '020',
        'code' => '001',
        'name' => 'MOME',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '020',
        'code' => '002',
        'name' => 'HUNTUK',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '020',
        'code' => '003',
        'name' => 'PIMPI',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '020',
        'code' => '004',
        'name' => 'BUNIA',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '020',
        'code' => '005',
        'name' => 'KOPI',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '020',
        'code' => '006',
        'name' => 'BINTAUNA PANTAI',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '020',
        'code' => '007',
        'name' => 'MINANGA',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '020',
        'code' => '008',
        'name' => 'BATULINTIK',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '020',
        'code' => '009',
        'name' => 'BINTAUNA',
        'stat_pem' => 'KELURAHAN'
      ),
      array(
        'kode_kec' => '020',
        'code' => '010',
        'name' => 'TALAGA',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '020',
        'code' => '011',
        'name' => 'VOA A',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '020',
        'code' => '012',
        'name' => 'PADANG',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '020',
        'code' => '013',
        'name' => 'KUHANGA',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '020',
        'code' => '014',
        'name' => 'BUNONG',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '020',
        'code' => '015',
        'name' => 'PADANG BARAT',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '020',
        'code' => '016',
        'name' => 'VAHUTA',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '030',
        'code' => '001',
        'name' => 'MOKODITEK I',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '030',
        'code' => '002',
        'name' => 'MOKODITEK',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '030',
        'code' => '003',
        'name' => 'NUNUKA',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '030',
        'code' => '004',
        'name' => 'SALEO',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '030',
        'code' => '005',
        'name' => 'BINUANGA',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '030',
        'code' => '006',
        'name' => 'BOHABAK IV',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '030',
        'code' => '007',
        'name' => 'BOHABAK II',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '030',
        'code' => '008',
        'name' => 'BOHABAK I',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '030',
        'code' => '009',
        'name' => 'BOHABAK III',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '030',
        'code' => '010',
        'name' => 'BINJEITA',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '030',
        'code' => '011',
        'name' => 'BINJEITA I',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '030',
        'code' => '012',
        'name' => 'BINJEITA II',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '030',
        'code' => '013',
        'name' => 'BIONTONG',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '030',
        'code' => '014',
        'name' => 'BIONTONG II',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '030',
        'code' => '015',
        'name' => 'BIONTONG I',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '030',
        'code' => '016',
        'name' => 'SALEO I',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '030',
        'code' => '017',
        'name' => 'NAGARA',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '030',
        'code' => '018',
        'name' => 'TANJUNG LABUO',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '030',
        'code' => '019',
        'name' => 'BINUNI',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '030',
        'code' => '020',
        'name' => 'LIPU BOGU',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '040',
        'code' => '001',
        'name' => 'PAKU',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '040',
        'code' => '002',
        'name' => 'OLLOT II',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '040',
        'code' => '003',
        'name' => 'OLLOT',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '040',
        'code' => '004',
        'name' => 'OLLOT I',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '040',
        'code' => '005',
        'name' => 'SONUO',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '040',
        'code' => '006',
        'name' => 'WAKAT',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '040',
        'code' => '007',
        'name' => 'TOTE',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '040',
        'code' => '008',
        'name' => 'IYOK',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '040',
        'code' => '009',
        'name' => 'LANGI',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '040',
        'code' => '010',
        'name' => 'JAMBU SARANG',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '040',
        'code' => '011',
        'name' => 'TALAGA TUMOAGU',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '040',
        'code' => '012',
        'name' => 'BOLANGITANG',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '040',
        'code' => '013',
        'name' => 'BOLANGITANG I',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '040',
        'code' => '014',
        'name' => 'BOLANGITANG II',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '040',
        'code' => '015',
        'name' => 'TALAGA',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '040',
        'code' => '016',
        'name' => 'PAKU SELATAN',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '040',
        'code' => '017',
        'name' => 'KEIMANGA',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '040',
        'code' => '018',
        'name' => 'TANJUNG BUAYA',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '050',
        'code' => '001',
        'name' => 'KOMUS DUA',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '050',
        'code' => '002',
        'name' => 'SOLO',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '050',
        'code' => '003',
        'name' => 'INOMUNGA',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '050',
        'code' => '004',
        'name' => 'BOROKO',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '050',
        'code' => '005',
        'name' => 'BOROKO TIMUR',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '050',
        'code' => '006',
        'name' => 'BIGO',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '050',
        'code' => '007',
        'name' => 'KUALA',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '050',
        'code' => '008',
        'name' => 'PONTAK',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '050',
        'code' => '009',
        'name' => 'KUALA UTARA',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '050',
        'code' => '010',
        'name' => 'KOMUS DUA TIMUR',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '050',
        'code' => '011',
        'name' => 'INOMUNGA UTARA',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '050',
        'code' => '012',
        'name' => 'BIGO SELATAN',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '050',
        'code' => '013',
        'name' => 'SOLIGIR',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '050',
        'code' => '014',
        'name' => 'BOROKO UTARA',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '050',
        'code' => '015',
        'name' => 'GIHANG',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '060',
        'code' => '001',
        'name' => 'BUSATO',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '060',
        'code' => '002',
        'name' => 'KAYUOGU',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '060',
        'code' => '003',
        'name' => 'BATU BANTAYO',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '060',
        'code' => '004',
        'name' => 'TONTULOW',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '060',
        'code' => '005',
        'name' => 'TOMBULANG',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '060',
        'code' => '006',
        'name' => 'BUKO',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '060',
        'code' => '007',
        'name' => 'BUKO SELATAN',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '060',
        'code' => '008',
        'name' => 'DALAPULI',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '060',
        'code' => '009',
        'name' => 'BATUTAJAM',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '060',
        'code' => '010',
        'name' => 'DENGI',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '060',
        'code' => '011',
        'name' => 'TUNTUNG',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '060',
        'code' => '012',
        'name' => 'KOMUS I',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '060',
        'code' => '013',
        'name' => 'TANJUNG SIDUPA',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '060',
        'code' => '014',
        'name' => 'TONTULOW UTARA',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '060',
        'code' => '015',
        'name' => 'BUKO UTARA',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '060',
        'code' => '016',
        'name' => 'DALAPULI BARAT',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '060',
        'code' => '017',
        'name' => 'DALAPULI TIMUR',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '060',
        'code' => '018',
        'name' => 'TOMBULANG TIMUR',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '060',
        'code' => '019',
        'name' => 'TOMBULANG PANTAI',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '060',
        'code' => '020',
        'name' => 'DUINI',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '060',
        'code' => '021',
        'name' => 'TUNTUNG TIMUR',
        'stat_pem' => 'DESA'
      ),
      array(
        'kode_kec' => '060',
        'code' => '022',
        'name' => 'PADANGO',
        'stat_pem' => 'DESA'
      )
    ));
    $desas->each(function ($desa) {
            $kec = Kecamatan::where('code', $desa['kode_kec'])->first();
            $desa['kecamatan_id'] = $kec->id;

            if ($kec->id === null) {
              throw new \Exception('Kabupaten with code 7107 not found');
          }
            unset($desa['kode_kec']);

            Desa::create($desa);
        });
  }
}
