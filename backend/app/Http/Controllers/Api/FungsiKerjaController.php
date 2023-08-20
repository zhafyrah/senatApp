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

        $fungsiKerjaList = FungsiKerja::with('anggota')->paginate();

        return $this->paginateResponse($fungsiKerjaList);
    }
    public function store(Request $request)
    {

        DB::beginTransaction();
        try {
            // Validasi input
            $this->validationException(Validator::make(
                $request->all(),
                [
                    'komisi' => 'required',
                    'nama_komisi' => 'required',
                    'ketua_komisi' => 'required',
                    'fungsi_kerja' => 'required',
                ],
                [
                    'komisi.required' => 'Komisi Kosong',
                    'nama_komisi.required' => 'Nama Komisi Kosong',
                    'ketua_komisi.required' => 'Ketua Komisi Kosong',
                    'fungsi_kerja.required' => 'Fungsi Kerja Kosong',
                ]
            ));

            // Data Fungsi Kerja
            $dataFungsiKerja = [
                'komisi' => $request->komisi,
                'nama_komisi' => $request->nama_komisi,
                'ketua_komisi' => $request->ketua_komisi,
                'fungsi_kerja' => $request->fungsi_kerja,
            ];

            // Simpan Fungsi Kerja
            $fungsiKerja = FungsiKerja::create($dataFungsiKerja);

            // Data Anggota Fungsi Kerja
            $anggotaData = [];
            for ($i = 1;; $i++) {
                $namaAnggota = $request->input("nama_anggota{$i}");
                if (!$namaAnggota) {
                    break; // Exit the loop if there's no more input
                }
                $anggotaData[] = ['nama_anggota' => $namaAnggota, 'fungsi_kerja_id' => $fungsiKerja->id];
            }

            // Simpan Anggota Fungsi Kerja
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

            // Update data Fungsi Kerja
            $fungsiKerja->update([
                'komisi' => $request->komisi,
                'nama_komisi' => $request->nama_komisi,
                'ketua_komisi' => $request->ketua_komisi,
                'fungsi_kerja' => $request->fungsi_kerja,
            ]);

            // Update atau tambahkan anggota
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

            // Hapus anggota sebelum menghapus Fungsi Kerja
            AnggotaFungsiKerja::where('fungsi_kerja_id', $fungsiKerja->id)->delete();
            $fungsiKerja->delete();

            return $this->successResponse();
        } catch (Throwable $e) {
            return $this->exceptionResponse($e);
        }
    }
}
