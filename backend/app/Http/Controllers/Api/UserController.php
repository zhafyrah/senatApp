<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRoleModel;
use Carbon\Carbon;
use DateTime;
use DB;
use Hash;
use Throwable;
use Validator;

class UserController extends Controller
{
    public function __construct()
    {
    }

    public function show(Request $request, $id = 0)
    {
        //\Log::info('show', $request->all());
        //\Log::info('url >> ' . url()->full());
        if ($id > 0) {
            $data = User::singleRow($id);

            return $this->successResponse($data);
        }

        $data = User::list($request->header('userId'));
        return $this->paginateResponse($data);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $this->validationException(Validator::make(
                $request->all(),
                [
                    'nama'     => 'required',
                    'nip'     => 'required',
                    'role'  => 'required',
                    'email'  => 'required',
                    'password' => 'required',
                ],
                [
                    'nama.required'     => 'Nama Kosong',
                    'nip.required'     => 'Nip Kosong',
                    'role.required'  => 'Role Kosong',
                    'email.required'  => 'Email Kosong',
                    'password.required'  => 'Password Kosong',
                ]
            ));

            $dataUser = [
                'nama' => $request->nama,
                'nip' => $request->nip,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'status' => 1,
                'created_at' => DB::raw('NOW()'),
                'updated_at' => DB::raw('NOW()'),
            ];

            $user = User::create($dataUser);

            $dataRole = [
                'users_id' => $user->id,
                'roles_id' => $request->role
            ];

            UserRoleModel::create($dataRole);

            DB::commit();

            return $this->successResponse();
        } catch (Throwable $e) {
            DB::rollBack();
            return $this->exceptionResponse($e);
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $user = User::find($id);

            if (!empty($request->nama)) {
                $user->nama = $request->nama;
            }
            if (!empty($request->nip)) {
                $user->nip = $request->nip;
            }
            if (!empty($request->status)) {
                $user->status =  (int) $request->status;
            }
            if (!empty($request->email)) {
                $user->email = $request->email;
            }
            if (!empty($request->password)) {
                $user->password = $request->password;
            }

            if (!empty($request->role) && !empty($request->user_roles_id)) {
                $userRole = UserRoleModel::find($request->user_roles_id);
                $userRole->roles_id = $request->role;
            }

            $user->updated_at = date('Y-m-d H:i:s');
            $user->save();
            if (isset($userRole)) {
                $userRole->save();
            }

            return $this->successResponse();
        } catch (Throwable $e) {
            DB::rollBack();
            return $this->exceptionResponse($e);
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $user = User::find($id);
            $user->delete();

            return $this->successResponse();
        } catch (Throwable $e) {
            return $this->exceptionResponse($e);
        }
    }
}
