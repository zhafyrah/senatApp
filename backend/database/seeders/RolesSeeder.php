<?php

namespace Database\Seeders;

use App\Models\RoleModel;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Schema;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        $data = [
            [
                'role' => 'admin',
                'permission' => '*',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'role' => 'ketua',
                'permission' => '*',
                'exclude' => 'dokumen komisi, user, berita',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'role' => 'anggota',
                'permission' => 'dashboard, dokumen pleno',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'role' => 'komisi',
                'permission' => 'dashboard, dokumen komisi, dokumen pleno',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]
        ];

        foreach ($data as $d) {
            RoleModel::query()->insert($d);
        }

        Schema::enableForeignKeyConstraints();
    }
}
