<?php

namespace Database\Seeders;

use App\Models\UserRoleModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Schema;

class UserRolesSeeder extends Seeder
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
                'users_id' => 1,
                'roles_id' => 1,
            ],
            [
                'users_id' => 2,
                'roles_id' => 2,
            ],
            [
                'users_id' => 3,
                'roles_id' => 3,
            ],
            [
                'users_id' => 4,
                'roles_id' => 4,
            ]
        ];

        foreach ($data as $d) {
            UserRoleModel::query()->insert($d);
        }

        Schema::enableForeignKeyConstraints();
    }
}
