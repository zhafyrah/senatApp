<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Berita;
use App\Models\DokumenKomisi;
use App\Models\DokumenPleno;
use App\Models\DokumenSenat;
use Illuminate\Database\Seeder;
use Schema;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        Schema::disableForeignKeyConstraints();

        $this->call(UserSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(UserRolesSeeder::class);

        //Berita::factory(30)->create();

        DokumenPleno::factory(30)->create();
        DokumenKomisi::factory(30)->create();
        DokumenSenat::factory(30)->create();

        Schema::enableForeignKeyConstraints();
    }
}
