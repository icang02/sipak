<?php

namespace Database\Seeders;

use App\Models\TimPenilai;
use Illuminate\Database\Seeder;

class TimPenilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1 -5
        TimPenilai::create([
            'nama' => 'ANDI ASTRIYANTI UMAR, S.Psi M.M',
            'nip' => '198205292006042003',
        ]);
        TimPenilai::create([
            'nama' => 'ANDRI, S.Sos',
            'nip' => '198810132018011002',
        ]);
        TimPenilai::create([
            'nama' => 'ASDA, S.Sos, M.M.',
            'nip' => '197206111996031001',
        ]);
        TimPenilai::create([
            'nama' => 'BAHTIAR, S.Pd',
            'nip' => '197802112008021001',
        ]);
        TimPenilai::create([
            'nama' => 'DARISMAN PAEHA, S. KM, M.M.',
            'nip' => '199106032014021001',
        ]);

        // 6 -10
        TimPenilai::create([
            'nama' => 'EPRI WIGUNARTO, AMK, S.Si, M.Kes',
            'nip' => '197504101997031003',
        ]);
        TimPenilai::create([
            'nama' => 'Drs FAIDHA, MM',
            'nip' => '196803101993031009',
        ]);
        TimPenilai::create([
            'nama' => 'FERIASMITA, S.Sos.,M.A.P',
            'nip' => '198802032010122001',
        ]);
        TimPenilai::create([
            'nama' => 'HUSNI HALIM, S.Sos',
            'nip' => '197803151999031003',
        ]);
        TimPenilai::create([
            'nama' => 'IKLAMIN, S.Sos',
            'nip' => '198004202010121002',
        ]);

        // 11 - 15
        TimPenilai::create([
            'nama' => 'LA ODE RUDIANTO, S.SOS',
            'nip' => '198203102009011012',
        ]);
        TimPenilai::create([
            'nama' => 'LIDIA SAMPE BULO, SE',
            'nip' => '198105102011012007',
        ]);
        TimPenilai::create([
            'nama' => 'MUSDALIFAH, S.IP, M.M.',
            'nip' => '198609152010122003',
        ]);
        TimPenilai::create([
            'nama' => 'dr RIFKI MUSLIM',
            'nip' => '198403212015031002',
        ]);
        TimPenilai::create([
            'nama' => 'SAIDAH, SE., M.M.',
            'nip' => '196802201994012002',
        ]);

        // 16 - 20
        TimPenilai::create([
            'nama' => 'SEALTI ALLO, S.Sos., M.A',
            'nip' => '196604181986032006',
        ]);
        TimPenilai::create([
            'nama' => 'TAUFIQ RIDI, S.E., M.M.',
            'nip' => '198303042008021002',
        ]);
        TimPenilai::create([
            'nama' => 'WA ODE SALMIATI, S.ST., M.M.',
            'nip' => '198508172010012042',
        ]);
        TimPenilai::create([
            'nama' => 'WA ODE ZAINAB, S.Sos',
            'nip' => '196712311991032016',
        ]);
        TimPenilai::create([
            'nama' => 'WAHYUNING SRI HERDIANI, S. Psi.',
            'nip' => '198704092014022001',
        ]);

        // 21 - selesai
        TimPenilai::create([
            'nama' => 'YOSIAS S B, S.KM',
            'nip' => '197605111999031005',
        ]);
    }
}
