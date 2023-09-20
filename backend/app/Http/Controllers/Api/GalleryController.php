<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Foundation\FormRequest;
use Illuminate\Foundation\Http\FormRequest as HttpFormRequest;
use Throwable;
use Validator;

class GalleryController extends Controller
{
    public function __construct()
    {
    }

    public function show(Request $request, $id = 0)
    {
        //\Log::info('show', $request->all());
        //\Log::info('url >> ' . url()->full());
        if ($id > 0) {
            $data = Gallery::singleRow($id);

            return $this->successResponse($data);
        }

        $data = Gallery::list();
        $keyword = $request->input('search');
        $query = Gallery::query();

        if (!empty($keyword)) {
            $query->where('keterangan', 'LIKE', "%$keyword%");
        }

        $data = $query->paginate(10);
        return $this->paginateResponse($data);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $this->validationException(Validator::make(
                $request->all(),
                [
                    'keterangan' => 'required',
                    'foto' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
                ],
                [
                    'keterangan.required'     => 'Keterangan Kosong',
                    'foto.required'     => 'Foto Kosong',
                    'foto.mimes' => 'Format foto tidak valid. Gunakan format JPEG, PNG, JPG, atau GIF',
                ]
            ));

            $file = $request->file('foto');
            $fileName = clean_file_name($file->getClientOriginalName());
            $saveName = '/img/gallery/' . $fileName;
            $destinationPath = public_path('/img/gallery');

            $file->move($destinationPath, $fileName);

            $data = [
                'keterangan' => $request->keterangan,
                'foto_name' => $fileName,
                'foto_path' => $saveName,
                'created_user' => $request->header('userId'),
                'modified_user' => $request->header('userId'),
            ];

            Gallery::create($data);

            DB::commit();

            return $this->successResponse();
        } catch (Throwable $e) {
            DB::rollBack();
            if (isset($fileName) && is_file($fileName) && file_exists($fileName)) {
                unlink(public_path('/img/gallery') . $fileName);
            }

            \Log::warning($e->getMessage());
            return $this->exceptionResponse($e);
        }
    }

    public function edit($id, HttpFormRequest $request)
    {
        dd($request->all());
        die;
        try {
            $berita = Gallery::find($id);
            $berita->keterangan = $request->keterangan;
            $berita->modified_user = $request->modified_user;

            // Cek apakah ada file yang dikirim
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $fileName = clean_file_name($file->getClientOriginalName());
                $saveName = '/img/gallery/' . md5($fileName);
                $destinationPath = public_path('/img/gallery');

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

    public function destroy(Request $request, $id)
    {
        try {
            $berita = Gallery::find($id);
            $berita->delete();

            return $this->successResponse();
        } catch (Throwable $e) {
            return $this->exceptionResponse($e);
        }
    }
}
