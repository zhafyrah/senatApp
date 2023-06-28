<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RoleModel;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function __construct(){

    }

    public function show(Request $request){
        $data = RoleModel::all();

        return $this->successResponse($data);
    }
}
