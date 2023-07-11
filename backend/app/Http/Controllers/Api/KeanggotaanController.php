<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Keanggotaan;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Throwable;
use Validator;

class KeanggotaanController extends Controller {
    public function __construct() {
    }

    public function show(Request $request, $id = 0) {
        //\Log::info('show', $request->all());
        //\Log::info('url >> ' . url()->full());
        if ($id > 0) {
            $data = Keanggotaan::singleRow($id);

            return $this->successResponse($data);
        }

        $data = Keanggotaan::list();
        return $this->paginateResponse($data);
    }

    public function store(Request $request) {
        //\Log::info('store', $request->all());
        DB::beginTransaction();
        try {
            $this->validationException(Validator::make(
                $request->all(),
                [
                    'nama'     => 'required',
                    'jabatan'  => 'required',
                    'pendidikan'  => 'required',
                    'foto'  => 'required',
                ],
                [
                    'nama.required'     => 'Nama Kosong',
                    'jabatan.required'  => 'Jabatan Kosong',
                    'pendidikan.required'     => 'Pendidikan Kosong',
                    'foto.required'     => 'Foto Kosong',
                ]
            ));

            $file = $request->file('foto');
            $fileName = clean_file_name($file->getClientOriginalName());
            $saveName = "/img/keanggotaan/" . md5($fileName);
            $destinationPath = public_path('/img/keanggotaan');

            $file->move($destinationPath, $fileName);

            $data = [
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'pendidikan' => $request->pendidikan,
                'foto_name' => $fileName,
                'foto_path' => $saveName,
                'created_user' => $request->header('userId'),
                'modified_user' => $request->header('userId'),
            ];

            Keanggotaan::create($data);

            DB::commit();

            return $this->successResponse();
        } catch (Throwable $e) {
            DB::rollBack();
            if (isset($fileName) && is_file($fileName) && file_exists($fileName)) {
                unlink(public_path('/img/keanggotaan') . $fileName);
            }

            return $this->exceptionResponse($e);
        }
    }

    public function edit(Request $request, $id) {
        try {
            $this->validationException(Validator::make(
                $request->all(),
                [
                    'userId'  => 'required',
                ],
                [
                    'userId.required'  => 'User Tidak Valid',
                ]
            ));

            $berita = Keanggotaan::find($id);
            $berita->nama = $request->nama;
            $berita->jabatan = $request->jabatan;
            $berita->pendidikan = $request->pendidikan;
            $berita->modified_user = $request->modified_user;

            if ($file = $request->file('foto')) {
                $fileName = clean_file_name($file->getClientOriginalName());
                $saveName = '/img/keanggotaan/' . md5($fileName);
                $destinationPath = public_path('/img/keanggotaan');

                $file->move($destinationPath, $fileName);

                $berita->foto_path = $saveName;
                $berita->foto_name = $fileName;
            }

            $berita->save();
            return $this->successResponse();
        } catch (Throwable $e) {
            DB::rollBack();
            return $this->exceptionResponse($e);
        }
    }

    public function destroy(Request $request, $id) {
        try {
            $berita = Keanggotaan::find($id);
            $berita->delete();

            return $this->successResponse();
        } catch (Throwable $e) {
            return $this->exceptionResponse($e);
        }
    }
}
