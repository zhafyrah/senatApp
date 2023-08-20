<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KomentarDokumenPleno;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Throwable;
use Validator;

class KomentarDokumenPlenoController extends Controller
{
    public function __construct()
    {
    }

    public function show(Request $request, $id = 0)
    {
        //\Log::info('show', $request->all());
        //\Log::info('url >> ' . url()->full());
        if ($id > 0) {
            $data = KomentarDokumenPleno::singleRow($id);

            return $this->successResponse($data);
        }

        $data = KomentarDokumenPleno::where('dokumen_pleno_id', $request->documentId)->list();
        return $this->paginateResponse($data);
    }

    public function store(Request $request)
    {
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
                'dokumen_pleno_id' => $request->dokId,
                'user_id' => $request->header('userId'),
                'komentar' => $request->komentar,
            ];

            if (!empty($file = $request->file('attachment'))) {
                $fileName = clean_file_name($file->getClientOriginalName());
                $saveName = '/img/komentar-dokumen-komisi/' . $fileName;
                $destinationPath = public_path('/img/komentar-dokumen-komisi');

                $file->move($destinationPath, $fileName);
                $data['attachment_path'] = $saveName;
                $data['attachment_name'] = $fileName;
            }

            KomentarDokumenPleno::create($data);

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
            $dok = KomentarDokumenPleno::find($id);
            $dok->delete();

            return $this->successResponse();
        } catch (Throwable $e) {
            return $this->exceptionResponse($e);
        }
    }
}
