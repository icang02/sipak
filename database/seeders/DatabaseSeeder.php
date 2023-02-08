<?php

namespace Database\Seeders;

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
            PKBSeeder::class,
            JabatanSeeder::class
        ]);

        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
        ]);
    }
}
