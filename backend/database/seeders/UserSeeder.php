<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use DB;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        $users = [
            [
                'nama'        => 'Admin',
                'nip'        => '19923005202308',
                'email'             => 'admin@gmail.com',
                'password'          => Hash::make('password'),
                'status' => 1,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'nama'        => 'Ketua',
                'nip'        => '19943005202308',
                'email'             => 'ketua@gmail.com',
                'password'          => Hash::make('password'),
                'status' => 1,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'nama'        => 'Anggota',
                'email'             => 'anggota@gmail.com',
                'nip'        => '19923005202308',
                'password'          => Hash::make('password'),
                'status' => 1,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'nama'        => 'Komisi',
                'email'             => 'komisi@gmail.com',
                'nip'        => '19923005202308',
                'password'          => Hash::make('password'),
                'status' => 1,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
        ];

        foreach ($users as $user_data) {
            $id = User::create($user_data);

            DB::table('password_backup')->insert([
                'users_id' => $id->id,
                'password' => 'password'
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
