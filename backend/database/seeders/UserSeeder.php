<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use DB;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Schema;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Schema::disableForeignKeyConstraints();

        $users = [
            [
                'first_name'        => 'Admin',
                'last_name'         => 'User',
                'email'             => 'admin@admin.com',
                'password'          => Hash::make('12345'),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'first_name'        => 'Ketua',
                'last_name'         => 'User',
                'email'             => 'ketua@admin.com',
                'password'          => Hash::make('12345'),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'first_name'        => 'Anggota',
                'last_name'         => 'User',
                'email'             => 'anggota@admin.com',
                'password'          => Hash::make('12345'),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'first_name'        => 'Komisi',
                'last_name'         => 'User',
                'email'             => 'komisi@admin.com',
                'password'          => Hash::make('12345'),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
        ];

        foreach ($users as $user_data) {
            $id = User::create($user_data);

            DB::table('password_backup')->insert([
                'users_id' => $id->id,
                'password' => '12345'
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
