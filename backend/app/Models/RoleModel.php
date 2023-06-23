<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleModel extends BaseModel {
    use HasFactory;

    public $table = 'roles';

    protected $fillable = [
        'role',
        'permission',
        'exclude'
    ];
}
