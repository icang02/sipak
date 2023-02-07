<?php

namespace Database\Seeders;

use App\Models\Dupak;
use Illuminate\Database\Seeder;

class DupakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            // DATA TAHUN 2021 ==============================================================
            [
                'nama' => 'KURNIA',
                'nip' => '196410171986011001',
                'jabatan_id' => 1,
                'kota' => null,
                'pak_janjun' => null,
                'pak_juldes' => 7,
                'tahun' => '2021',
                'kota' => null,
                'pangkat' => null,
                'golongan' => null,
            ],
            [
                'nama' => 'JARMAN, S.Ag',
                'nip' => '196212311985031176',
                'jabatan_id' => 5,
                'kota' => null,
                'pak_janjun' => null,
                'pak_juldes' => null,
                'tahun' => '2021',
                'kota' => null,
                'pangkat' => null,
                'golongan' => null,
            ],
            [
                'nama' => 'BAISU, SH',
                'nip' => '196312311993031114',
                'jabatan_id' => 5,
                'kota' => null,
                'pak_janjun' => null,
                'pak_juldes' => null,
                'tahun' => '2021',
                'kota' => null,
                'pangkat' => null,
                'golongan' => null,
            ],
            [
                'nama' => 'SRI BUDI EKAWATI, S.IP',
                'nip' => '196410101986032026',
                'jabatan_id' => 5,
                'kota' => null,
                'pak_janjun' => 15,
                'pak_juldes' => 8,
                'tahun' => '2021',
                'kota' => null,
                'pangkat' => null,
                'golongan' => null,
            ],
            [
                'nama' => 'SARTINA',
                'nip' => '196412281986032014',
                'jabatan_id' => 5,
                'kota' => null,
                'pak_janjun' => 16,
                'pak_juldes' => 18,
                'tahun' => '2021',
                'kota' => null,
                'pangkat' => null,
                'golongan' => null,
            ],
            [
                'nama' => 'RASYID, S.SOS',
                'nip' => '196412311986031246',
                'jabatan_id' => 5,
                'kota' => null,
                'pak_janjun' => null,
                'pak_juldes' => null,
                'tahun' => '2021',
                'kota' => null,
                'pangkat' => null,
                'golongan' => null,
            ],
            [
                'nama' => 'ARSYAD',
                'nip' => '196412311991031140',
                'jabatan_id' => 5,
                'kota' => null,
                'pak_janjun' => null,
                'pak_juldes' => 7,
                'tahun' => '2021',
                'kota' => null,
                'pangkat' => null,
                'golongan' => null,
            ],
            [
                'nama' => 'HASAN TABENE',
                'nip' => '196412312014101002',
                'jabatan_id' => 5,
                'kota' => null,
                'pak_janjun' => 14,
                'pak_juldes' => 2,
                'tahun' => '2021',
                'kota' => null,
                'pangkat' => null,
                'golongan' => null,
            ],

            // DATA TAHUN 2022 ==============================================================
            [
                'nama' => 'KURNIA',
                'nip' => '196412312014101002',
                'jabatan_id' => 5,
                'kota' => null,
                'pak_janjun' => null,
                'pak_juldes' => null,
                'tahun' => '2022',
                'kota' => null,
                'pangkat' => null,
                'golongan' => null,
            ],
            [
                'nama' => 'JARMAN, S.Ag',
                'nip' => '196212311985031176',
                'jabatan_id' => 5,
                'kota' => null,
                'pak_janjun' => null,
                'pak_juldes' => null,
                'tahun' => '2021',
                'kota' => null,
                'pangkat' => null,
                'golongan' => null,
            ],
            [
                'nama' => 'BAISU, SH',
                'nip' => '196312311993031114',
                'jabatan_id' => 5,
                'kota' => null,
                'pak_janjun' => null,
                'pak_juldes' => null,
                'tahun' => '2021',
                'kota' => null,
                'pangkat' => null,
                'golongan' => null,
            ],
            [
                'nama' => 'SRI BUDI EKAWATI, S.IP',
                'nip' => '196410101986032026',
                'jabatan_id' => 5,
                'kota' => null,
                'pak_janjun' => 15,
                'pak_juldes' => 8,
                'tahun' => '2021',
                'kota' => null,
                'pangkat' => null,
                'golongan' => null,
            ],
            [
                'nama' => 'SARTINA',
                'nip' => '196412281986032014',
                'jabatan_id' => 5,
                'kota' => null,
                'pak_janjun' => 16,
                'pak_juldes' => 18,
                'tahun' => '2022',
                'kota' => null,
                'pangkat' => null,
                'golongan' => null,
            ],
            [
                'nama' => 'RASYID, S.SOS',
                'nip' => '196412311986031246',
                'jabatan_id' => 5,
                'kota' => null,
                'pak_janjun' => null,
                'pak_juldes' => null,
                'tahun' => '2022',
                'kota' => null,
                'pangkat' => null,
                'golongan' => null,
            ],
            [
                'nama' => 'ARSYAD',
                'nip' => '196412311991031140',
                'jabatan_id' => 5,
                'kota' => null,
                'pak_janjun' => null,
                'pak_juldes' => 7,
                'tahun' => '2022',
                'kota' => null,
                'pangkat' => null,
                'golongan' => null,
            ],
            [
                'nama' => 'HASAN TABENE',
                'nip' => '196412312014101002',
                'jabatan_id' => 5,
                'kota' => null,
                'pak_janjun' => 14,
                'pak_juldes' => 2,
                'tahun' => '2022',
                'kota' => null,
                'pangkat' => null,
                'golongan' => null,
            ],
        ];

        foreach ($data as $item) {
            Dupak::create($item);
        }
    }
}
