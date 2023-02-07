<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // ProvincesSeeder::class,
            // CitiesSeeder::class,
            // DistrictsSeeder::class,
            // VillagesSeeder::class,
            TimPenilaiSeeder::class,
            DupakSeeder::class,
        ]);

        Jabatan::create(['nama' => 'PKB Pemula']);
        Jabatan::create(['nama' => 'PKB Ahli Muda']);
        Jabatan::create(['nama' => 'PKB Ahli Pertama']);
        Jabatan::create(['nama' => 'PKB Ahli Madya']);
        Jabatan::create(['nama' => 'PKB Mahir']);
        Jabatan::create(['nama' => 'Penyuluh Keluarga Ahli Madya']);
        Jabatan::create(['nama' => 'PKB Terampil']);
        Jabatan::create(['nama' => 'PKB Penyelia']);
        Jabatan::create(['nama' => 'Petugas Lapangan Keluarga Berencana']);

        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
        ]);
    }
}
