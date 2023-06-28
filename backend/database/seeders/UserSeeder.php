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
                'nama'        => 'Admin',
                'email'             => 'admin@admin.com',
                'password'          => Hash::make('12345'),
                'status' => 1,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'nama'        => 'Ketua',
                'email'             => 'ketua@admin.com',
                'password'          => Hash::make('12345'),
                'status' => 1,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'nama'        => 'Anggota',
                'email'             => 'anggota@admin.com',
                'password'          => Hash::make('12345'),
                'status' => 1,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'nama'        => 'Komisi',
                'email'             => 'komisi@admin.com',
                'password'          => Hash::make('12345'),
                'status' => 1,
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
