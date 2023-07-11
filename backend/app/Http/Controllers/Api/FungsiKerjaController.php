<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FungsiKerja;
use DB;
use Illuminate\Http\Request;
use Throwable;
use Validator;

class FungsiKerjaController extends Controller
{
    public function __construct() {
    }

    public function show(Request $request, $id = 0) {
        //\Log::info('show', $request->all());
        //\Log::info('url >> ' . url()->full());
        if ($id > 0) {
            $data = FungsiKerja::singleRow($id);

            return $this->successResponse($data);
        }

        $data = FungsiKerja::list();
        return $this->paginateResponse($data);
    }

    public function store(Request $request) {
        //\Log::info('store', $request->all());
        DB::beginTransaction();
        try {
            $this->validationException(Validator::make(
                $request->all(),
                [
                    'komisi'     => 'required',
                    'ketua_komisi' => 'required',
                    'fungsi_kerja'  => 'required',
                ],
                [
                    'komisi.required'     => 'Komisi Kosong',
                    'ketua_komisi.required' => 'Ketua Komisi Kosong',
                    'fungsi_kerja.required'  => 'Fungsi Kerja Kosong',
                ]
            ));

            $data = [
                'komisi' => $request->komisi,
                'ketua_komisi' => $request->ketua_komisi,
                'fungsi_kerja' => $request->fungsi_kerja,
                'nama_anggota1' => $request->nama_anggota1,
                'nama_anggota2' => $request->nama_anggota2,
                'nama_anggota3' => $request->nama_anggota3,
                //'created_user' => $request->header('userId'),
                //'modified_user' => $request->header('userId'),
            ];

            FungsiKerja::create($data);

            DB::commit();

            return $this->successResponse();
        } catch (Throwable $e) {
            DB::rollBack();
            return $this->exceptionResponse($e);
        }
    }

    public function edit(Request $request, $id) {
        try {
            $fungsiKerja = FungsiKerja::find($id);
            $fungsiKerja->komisi = $request->komisi;
            $fungsiKerja->fungsi_kerja = $request->jabatan;
            $fungsiKerja->nama_anggota1 = $request->nama_anggota1;
            $fungsiKerja->nama_anggota2 = $request->nama_anggota2;
            $fungsiKerja->nama_anggota3 = $request->nama_anggota3;
            $fungsiKerja->modified_user = $request->modified_user;

            $fungsiKerja->save();
            return $this->successResponse();
        } catch (Throwable $e) {
            DB::rollBack();
            return $this->exceptionResponse($e);
        }
    }

    public function destroy(Request $request, $id) {
        try {
            $fungsiKerja = FungsiKerja::find($id);
            $fungsiKerja->delete();

            return $this->successResponse();
        } catch (Throwable $e) {
            return $this->exceptionResponse($e);
        }
    }
}
