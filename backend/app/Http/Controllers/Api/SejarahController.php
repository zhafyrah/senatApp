<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sejarah;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Throwable;
use Validator;

class SejarahController extends Controller
{
    public function __construct() {
    }

    public function show(Request $request, $id = 0) {
        //\Log::info('show', $request->all());
        //\Log::info('url >> ' . url()->full());
        if ($id > 0) {
            $data = Sejarah::singleRow($id);

            return $this->successResponse($data);
        }

        $data = Sejarah::list();
        return $this->paginateResponse($data);
    }

    public function store(Request $request) {
        DB::beginTransaction();

        try {
            $this->validationException(Validator::make(
                $request->all(),
                [
                    'isi'     => 'required',
                    'foto'  => 'required',
                    'judul' => 'required',
                ],
                [
                    'isi.required'     => 'Isi Kosong',
                    'judul.required'     => 'Judul Kosong',
                    'foto.required'     => 'Foto Kosong',
                ]
            ));

            $file = $request->file('foto');
            $fileName = clean_file_name($file->getClientOriginalName());
            $saveName = '/img/sejarah/' .$fileName;
            $destinationPath = public_path('/img/sejarah');

            $file->move($destinationPath, $fileName);

            $data = [
                'judul' => $request->judul,
                'isi' => $request->isi,
                'foto_name' => $fileName,
                'foto_path' => $saveName,
                'created_user' => $request->header('userId'),
                'modified_user' => $request->header('userId'),
            ];

            Sejarah::create($data);

            DB::commit();

            return $this->successResponse();
        } catch (Throwable $e) {
            DB::rollBack();

            if (isset($fileName) && is_file($fileName) && file_exists($fileName)) {
                unlink(public_path('/img/sejarah') . $fileName);
            }

            \Log::warning($e->getMessage());
            return $this->exceptionResponse($e);
        }
    }

    public function edit(Request $request, $id) {
        try {
            $berita = Sejarah::find($id);
            $berita->judul = $request->judul;
            $berita->isi = $request->isi;
            $berita->modified_user = $request->modified_user;
            $request->header('userId');

            if ($request->file('foto') != null && $file = $request->file('foto')) {
                $fileName = clean_file_name($file->getClientOriginalName());
                $saveName = '/img/sejarah/' . $fileName;
                $destinationPath = public_path('/img/sejarah');

                $file->move($destinationPath, $fileName);

                $berita->foto_path = $saveName;
                $berita->foto_name = $fileName;
            }

            $berita->save();
            return $this->successResponse();
        } catch (Throwable $e) {
            DB::rollBack();
            if (isset($fileName) && is_file($fileName) && file_exists($fileName)) {
                unlink(public_path('/img/sambutan') . $fileName);
            }
            return $this->exceptionResponse($e);
        }
    }

    public function destroy(Request $request, $id) {
        try {
            $berita = Sejarah::find($id);
            $berita->delete();

            return $this->successResponse();
        } catch (Throwable $e) {
            return $this->exceptionResponse($e);
        }
    }
}
