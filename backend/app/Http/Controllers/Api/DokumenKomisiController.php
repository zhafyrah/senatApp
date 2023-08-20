<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DokumenKomisi;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Log;
use Throwable;
use Validator;

class DokumenKomisiController extends Controller
{
    public function __construct()
    {
    }

    public function show(Request $request, $id = 0)
    {
        //\Log::info('show', $request->all());
        //\Log::info('url >> ' . url()->full());
        if ($id > 0) {
            $data = DokumenKomisi::singleRow($id);

            return $this->successResponse($data);
        }

        $data = DokumenKomisi::list();
        return $this->paginateResponse($data);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $this->validationException(Validator::make(
                $request->all(),
                [
                    'no_surat'     => 'required',
                    'dokumen'  => 'required',
                    'keterangan'  => 'required',
                ],
                [
                    'no_surat.required'     => 'No. Surat Kosong',
                    'dokumen.required'  => 'Dokumen Kosong',
                    'keterangan.required'     => 'Keterangan Kosong',
                ]
            ));

            $file = $request->file('dokumen');
            $fileName = clean_file_name($file->getClientOriginalName());
            $saveName = '/img/dokumen-komisi/' . $fileName;
            $destinationPath = public_path('/img/dokumen-komisi');

            $file->move($destinationPath, $fileName);

            $data = [
                'no_surat' => $request->no_surat,
                'dokumen_path' => $saveName,
                'dokumen_name' => $fileName,
                'keterangan' => $request->keterangan,
                'tanggal_unggah' => date('Y-m-d H:i:s', strtotime(Carbon::parse($request->tanggal_unggah))),
                'created_user' => $request->header('userId'),
                'modified_user' => $request->header('userId'),
            ];

            DokumenKomisi::create($data);

            DB::commit();

            return $this->successResponse();
        } catch (Throwable $e) {
            DB::rollBack();

            if (isset($fileName) && is_file($fileName) && file_exists($fileName)) {
                unlink(public_path('/img/dokumen-komisi') . $fileName);
            }

            return $this->exceptionResponse($e);
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            Log::warning("request", $request->all());
            $dok = DokumenKomisi::find($id);
            $dok->no_surat = $request->no_surat;
            $dok->keterangan = $request->keterangan;
            $dok->tanggal_unggah = $request->tanggal_unggah;
            $dok->modified_user = $request->header('userId');

            if ($request->file('dokumen') != null && $file = $request->file('dokumen')) {
                $fileName = clean_file_name($file->getClientOriginalName());
                $saveName = '/img/dokumen-komisi/' . $fileName;
                $destinationPath = public_path('/img/dokumen-komisi');

                $file->move($destinationPath, $fileName);

                $dok->dokumen_path = $saveName;
                $dok->dokumen_name = $fileName;
            }

            $dok->save();
            return $this->successResponse();
        } catch (Throwable $e) {
            DB::rollBack();
            if (isset($fileName) && is_file($fileName) && file_exists($fileName)) {
                unlink(public_path('/img/dokumen-komisi') . $fileName);
            }

            return $this->exceptionResponse($e);
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $dok = DokumenKomisi::find($id);
            $dok->delete();

            return $this->successResponse();
        } catch (Throwable $e) {
            return $this->exceptionResponse($e);
        }
    }
}
