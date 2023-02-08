<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jabatan::create(['nama' => 'PKB Ahli Muda']);    // 1  
        Jabatan::create(['nama' => 'PKB Ahli Madya']);   // 2
        Jabatan::create(['nama' => 'PKB Ahli Pertama']); // 3    
        Jabatan::create(['nama' => 'PKB Mahir']);        // 4
        Jabatan::create(['nama' => 'PKB Pemula']);       // 5
        Jabatan::create(['nama' => 'PKB Penyelia']);     // 6
        Jabatan::create(['nama' => 'PKB Terampil']);     // 7
    }
}
