<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FungsiKerja;
use App\Models\AnggotaFungsiKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;
use Validator;

class FungsiKerjaController extends Controller
{
    public function show(Request $request, $id = 0)
    {
        if ($id > 0) {
            $fungsiKerja = FungsiKerja::with('anggota')->find($id);

            if (!$fungsiKerja) {
                return $this->notFoundResponse('Fungsi Kerja not found.');
            }

            return $this->successResponse($fungsiKerja);
        }
        $keyword = $request->input('search');
        $query = FungsiKerja::query();

        if (!empty($keyword)) {
            $query->where('komisi', 'LIKE', "%$keyword%")
                ->orWhere('nama_komisi', 'LIKE', "%$keyword%");
        }

        $data = $query->paginate(10);
        $fungsiKerjaList = FungsiKerja::with('anggota')->paginate();

        return $this->paginateResponse($fungsiKerjaList);
    }
    public function store(Request $request)
    {

        DB::beginTransaction();
        try {
            $this->validationException(Validator::make(
                $request->all(),
                [
                    'komisi' => 'required',
                    'nama_komisi' => 'required',
                    'ketua_komisi' => 'required',
                    'fungsi_kerja' => 'required',
                ],
                [
                    'komisi.required' => 'Komisi kosong',
                    'nama_komisi.required' => 'Nama komisi kosong',
                    'ketua_komisi.required' => 'Ketua komisi kosong',
                    'fungsi_kerja.required' => 'Fungsi kerja kosong',
                ]
            ));

            $dataFungsiKerja = [
                'komisi' => $request->komisi,
                'nama_komisi' => $request->nama_komisi,
                'ketua_komisi' => $request->ketua_komisi,
                'fungsi_kerja' => $request->fungsi_kerja,
            ];

            $fungsiKerja = FungsiKerja::create($dataFungsiKerja);

            $anggotaData = [];
            for ($i = 1;; $i++) {
                $namaAnggota = $request->input("nama_anggota{$i}");
                if (!$namaAnggota) {
                    break;
                }
                $anggotaData[] = ['nama_anggota' => $namaAnggota, 'fungsi_kerja_id' => $fungsiKerja->id];
            }
            if (!empty($anggotaData)) {
                AnggotaFungsiKerja::insert($anggotaData);
            }

            DB::commit();

            return $this->successResponse();
        } catch (Throwable $e) {
            DB::rollBack();
            return $this->exceptionResponse($e);
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $fungsiKerja = FungsiKerja::find($id);
            if (!$fungsiKerja) {
                return $this->errorResponse('Fungsi Kerja not found', 404);
            }

            $fungsiKerja->update([
                'komisi' => $request->komisi,
                'nama_komisi' => $request->nama_komisi,
                'ketua_komisi' => $request->ketua_komisi,
                'fungsi_kerja' => $request->fungsi_kerja,
            ]);

            for ($i = 1; $i <= 5; $i++) {
                $namaAnggota = $request->input("nama_anggota{$i}");
                if ($namaAnggota) {
                    $anggota = AnggotaFungsiKerja::updateOrCreate(
                        ['fungsi_kerja_id' => $fungsiKerja->id, 'nama_anggota' => $namaAnggota],
                        ['fungsi_kerja_id' => $fungsiKerja->id, 'nama_anggota' => $namaAnggota]
                    );
                } else {
                    AnggotaFungsiKerja::where('fungsi_kerja_id', $fungsiKerja->id)->delete();
                }
            }

            return $this->successResponse();
        } catch (Throwable $e) {
            DB::rollBack();
            return $this->exceptionResponse($e);
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $fungsiKerja = FungsiKerja::find($id);
            if (!$fungsiKerja) {
                return $this->errorResponse('Fungsi Kerja not found', 404);
            }

            AnggotaFungsiKerja::where('fungsi_kerja_id', $fungsiKerja->id)->delete();
            $fungsiKerja->delete();

            return $this->successResponse();
        } catch (Throwable $e) {
            return $this->exceptionResponse($e);
        }
    }
}
