<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        $this->call(UserSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(UserRolesSeeder::class);

        Schema::enableForeignKeyConstraints();
    }
}
