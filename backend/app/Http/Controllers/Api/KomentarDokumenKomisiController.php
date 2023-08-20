<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KomentarDokumenKomisi;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Log;
use Throwable;
use Validator;


class KomentarDokumenKomisiController extends Controller
{
    public function __construct()
    {
    }

    public function show(Request $request, $id = 0)
    {
        //Log::info('show');
        //\Log::info('url >> ' . url()->full());
        if ($id > 0) {
            $data = KomentarDokumenKomisi::singleRow($id);

            return $this->successResponse($data);
        }

        $data = KomentarDokumenKomisi::where('dokumen_komisi_id', $request->documentId)->list();
        return $this->paginateResponse($data);
    }

    public function store(Request $request)
    {
        Log::warning('data', $request->all());

        DB::beginTransaction();

        try {
            $this->validationException(Validator::make(
                $request->all(),
                [
                    'dokId' => 'required',
                    'komentar'  => 'required',
                ],
                [
                    'dokId.required'     => 'Dokumen Tidak Valid',
                    'komentar.required'     => 'Komentar Kosong',
                ]
            ));

            $data = [
                'dokumen_komisi_id' => $request->dokId,
                'user_id' => $request->header('userId'),
                'komentar' => $request->komentar,
            ];

            if ($request->file('attachment') != null && ($file = $request->file('attachment'))) {
                $fileName = clean_file_name($file->getClientOriginalName());
                $saveName = '/img/komentar-dokumen-komisi/' . $fileName;
                $destinationPath = public_path('/img/komentar-dokumen-komisi');

                $file->move($destinationPath, $fileName);
                $data['attachment_path'] = $saveName;
                $data['attachment_name'] = $fileName;
            }

            KomentarDokumenKomisi::create($data);

            DB::commit();

            return $this->successResponse();
        } catch (Throwable $e) {
            DB::rollBack();

            if (isset($fileName) && is_file($fileName) && file_exists($fileName)) {
                unlink(public_path('/img/komentar-dokumen-komisi') . $fileName);
            }

            return $this->exceptionResponse($e);
        }
    }

    public function edit(Request $request, $id)
    {
        try {

            return $this->successResponse();
        } catch (Throwable $e) {
            DB::rollBack();
            return $this->exceptionResponse($e);
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $dok = KomentarDokumenKomisi::find($id);
            $dok->delete();

            return $this->successResponse();
        } catch (Throwable $e) {
            return $this->exceptionResponse($e);
        }
    }
}
