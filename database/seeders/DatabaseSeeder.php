<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            // UserSeeder::class
            master_lomba::class,
            master_detail_lomba::class,
            pelaksanaan_lomba::class
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
