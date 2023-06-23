<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRoleModel extends BaseModel {
    use HasFactory;

    protected $table = 'users_roles';

    protected $fillable = [
        'users_id',
        'roles_id'
    ];

    public static function allbyUserId($usersId) {
        $sql = "SELECT
                    r1.role,
                    r1.permission,
                    r1.exclude
                FROM
                    roles r1
                    JOIN users_roles u1 ON r1.id = u1.roles_id
                where
                    u1.users_id = $usersId";

        $query = \DB::select($sql);
        if (count($query) > 0) {
            return $query[0];
        }

        return [];
    }
}
