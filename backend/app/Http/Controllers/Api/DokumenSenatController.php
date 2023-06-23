<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DokumenSenat;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Throwable;
use Validator;

class DokumenSenatController extends Controller
{
    public function __construct() {
    }

    public function show(Request $request, $id = 0) {
        //\Log::info('show', $request->all());
        //\Log::info('url >> ' . url()->full());
        if ($id > 0) {
            $data = DokumenSenat::singleRow($id);

            return $this->successResponse($data);
        }

        $data = DokumenSenat::list();
        return $this->paginateResponse($data);
    }

    public function store(Request $request) {
        DB::beginTransaction();

        try {
            $this->validationException(Validator::make(
                $request->all(),
                [
                    'no_surat'     => 'required',
                    'dokumen'  => 'required',
                    'keterangan'  => 'required',
                    'status'  => 'required',
                ],
                [
                    'no_surat.required'     => 'No. Surat Kosong',
                    'dokumen.required'  => 'Dokumen Kosong',
                    'keterangan.required'     => 'Keterangan Kosong',
                    'status.required'     => 'Status Kosong',
                ]
            ));

            $file = $request->file('dokumen');
            $fileName = clean_file_name($file->getClientOriginalName());
            $saveName = '/img/dokumen-senat/' . $fileName;
            $destinationPath = public_path('/img/dokumen-senat');

            $file->move($destinationPath, $fileName);

            $data = [
                'no_surat' => $request->no_surat,
                'dokumen_path' => $saveName,
                'dokumen_name' => $fileName,
                'keterangan' => $request->keterangan,
                'status' => $request->status,
                'tanggal_unggah' => date('Y-m-d H:i:s', strtotime(Carbon::parse($request->tanggal_unggah))),
                'created_user' => $request->header('userId'),
                'modified_user' => $request->header('userId'),
            ];

            DokumenSenat::create($data);

            DB::commit();

            return $this->successResponse();
        } catch (Throwable $e) {
            if (isset($fileName) && is_file($fileName) && file_exists($fileName)) {
                unlink(public_path('/img/dokumen-senat') . $fileName);
            }

            return $this->exceptionResponse($e);
        }
    }

    public function edit(Request $request, $id) {
        try {
            $dok = DokumenSenat::find($id);
            $dok->judul = $request->judul;
            $dok->isi = $request->isi;
            $dok->modified_user = $request->modified_user;
            $dok->status = $request->status;

            if ($file = $request->file('dokumen')) {
                $fileName = clean_file_name($file->getClientOriginalName());
                $saveName = '/img/dokumen-senat/' . $fileName;
                $destinationPath = public_path('/img/dokumen-senat');

                $file->move($destinationPath, $fileName);

                $dok->dokumen_path = $saveName;
                $dok->dokumen_name = $fileName;
            }

            $dok->save();
            return $this->successResponse();
        } catch (Throwable $e) {
            if (isset($fileName) && is_file($fileName) && file_exists($fileName)) {
                unlink(public_path('/img/dokumen-senat') . $fileName);
            }

            return $this->exceptionResponse($e);
        }
    }

    public function destroy(Request $request, $id) {
        try {
            $dok = DokumenSenat::find($id);
            $dok->delete();

            return $this->successResponse();
        } catch (Throwable $e) {
            return $this->exceptionResponse($e);
        }
    }
}
