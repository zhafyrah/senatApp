<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Carbon\Carbon;
use DateTime;
use DB;
use Illuminate\Http\Request;
use Throwable;
use Validator;

class BeritaController extends Controller
{

    public function __construct()
    {
        /* $this->middleware('auth', [
            'except' => [
                '/'
            ]
        ]); */

        $this->middleware('api')->except([
            'show',
        ]);
    }

    public function show(Request $request, $id = 0)
    {
        //\Log::info('show', $request->all());
        //\Log::info('url >> ' . url()->full());
        if ($id > 0) {
            $data = Berita::singleRow($id);

            return $this->successResponse($data);
        }

        $data = Berita::list();
        return $this->paginateResponse($data);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $this->validationException(Validator::make(
                $request->all(),
                [
                    'judul'     => 'required',
                    'isi'  => 'required',
                    'foto'  => 'required',
                ],
                [
                    'judul.required'     => 'Judul Kosong',
                    'isi.required'  => 'Isi Kosong',
                    'foto.required'     => 'Foto Kosong',
                ]
            ));

            $file = $request->file('foto');
            $fileName = clean_file_name($file->getClientOriginalName());
            $saveName = '/img/berita/' . $fileName;
            $destinationPath = public_path('/img/berita');

            $file->move($destinationPath, $fileName);

            $data = [
                'judul' => $request->judul,
                'isi' => $request->isi,
                'tanggal_unggah' => date('Y-m-d H:i:s', strtotime(Carbon::parse($request->tanggal_unggah))),
                'foto_name' => $fileName,
                'foto_path' => $saveName,
                'created_user' => $request->header('userId'),
                'modified_user' => $request->header('userId'),
            ];

            Berita::create($data);

            DB::commit();

            return $this->successResponse();
        } catch (Throwable $e) {
            DB::rollBack();
            if (isset($fileName) && is_file($fileName) && file_exists($fileName)) {
                unlink(public_path('/img/berita') . $fileName);
            }

            return $this->exceptionResponse($e);
        }
    }

    public function edit(Request $request, $id)
    {
        try {

            $berita = Berita::find($id);
            $berita->judul = $request->judul;
            $berita->isi = $request->isi;
            $berita->tanggal_unggah = $request->tanggal_unggah;
            $berita->modified_user = $request->header('userId');
            // dd($request);
            // die;
            if ($file = $request->file('foto')) {
                $fileName = clean_file_name($file->getClientOriginalName());
                $saveName = '/img/berita/' . $fileName;
                $destinationPath = public_path('/img/berita');

                $file->move($destinationPath, $fileName);

                $berita->foto_path = $saveName;
                $berita->foto_name = $fileName;
            }

            $berita->update();
            return $this->successResponse();
        } catch (Throwable $e) {
            DB::rollBack();
            return $this->exceptionResponse($e);
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $berita = Berita::find($id);
            $berita->delete();

            return $this->successResponse();
        } catch (Throwable $e) {
            return $this->exceptionResponse($e);
        }
    }
}
