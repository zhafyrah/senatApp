<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sambutan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Throwable;
use Validator;

class SambutanController extends Controller
{
    public function __construct() {
    }

    public function show(Request $request, $id = 0) {
        //\Log::info('show', $request->all());
        //\Log::info('url >> ' . url()->full());
        if ($id > 0) {
            $data = Sambutan::singleRow($id);

            return $this->successResponse($data);
        }

        $data = Sambutan::list();
        return $this->paginateResponse($data);
    }

    public function store(Request $request) {
        DB::beginTransaction();

        try {
            $this->validationException(Validator::make(
                $request->all(),
                [
                    'nama_ketua_senat' => 'required',
                    'judul' => 'required',
                    'isi'     => 'required',
                    'foto'  => 'required',
                ],
                [
                    'nama_ketua_senat.required'     => 'Nama Ketua Senat Kosong',
                    'judul.required'     => 'Judul Kosong',
                    'isi.required'     => 'Isi Kosong',
                    'foto.required'     => 'Foto Kosong',
                ]
            ));

            $file = $request->file('foto');
            $fileName = clean_file_name($file->getClientOriginalName());
            $saveName = '/img/sambutan/' . md5($fileName);
            $destinationPath = public_path('/img/sambutan');

            $file->move($destinationPath, $fileName);

            $data = [
                'nama_ketua_senat' => $request->nama_ketua_senat,
                'judul' => $request->judul,
                'isi' => $request->isi,
                'foto_name' => $fileName,
                'foto_path' => $saveName,
                'created_user' => $request->header('userId'),
                'modified_user' => $request->header('userId'),
            ];

            Sambutan::create($data);

            DB::commit();

            return $this->successResponse();
        } catch (Throwable $e) {
            if (isset($fileName) && is_file($fileName) && file_exists($fileName)) {
                unlink(public_path('/img/sambutan') . $fileName);
            }

            \Log::warning($e->getMessage());
            return $this->exceptionResponse($e);
        }
    }

    public function edit(Request $request, $id) {
        try {
            $berita = Sambutan::find($id);
            $berita->ketua_senat = $request->ketua_senat;
            $berita->isi = $request->isi;
            $berita->modified_user = $request->modified_user;

            if ($file = $request->file('foto')) {
                $fileName = clean_file_name($file->getClientOriginalName());
                $saveName = '/img/sambutan/' . md5($fileName);
                $destinationPath = public_path('/img/sambutan');

                $file->move($destinationPath, $fileName);

                $berita->foto_path = $saveName;
                $berita->foto_name = $fileName;
            }

            $berita->save();
            return $this->successResponse();
        } catch (Throwable $e) {
            return $this->exceptionResponse($e);
        }
    }

    public function destroy(Request $request, $id) {
        try {
            $berita = Sambutan::find($id);
            $berita->delete();

            return $this->successResponse();
        } catch (Throwable $e) {
            return $this->exceptionResponse($e);
        }
    }
}
