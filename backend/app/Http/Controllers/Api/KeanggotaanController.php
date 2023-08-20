<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Keanggotaan;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Throwable;
use Validator;

class KeanggotaanController extends Controller
{
    public function __construct()
    {
    }

    public function show(Request $request, $id = 0)
    {
        //\Log::info('show', $request->all());
        //\Log::info('url >> ' . url()->full());
        if ($id > 0) {
            $data = Keanggotaan::singleRow($id);

            return $this->successResponse($data);
        }

        $data = Keanggotaan::list();
        $data->getCollection()->transform(function ($value) {
            $value['anggota'] = Anggota::byKeanggotaanId($value->id);
            return $value;
        });

        return $this->paginateResponse($data);
    }

    public function getDataChartOrg()
    {
        $data = Keanggotaan::list();

        $result = [];

        foreach ($data as $item) {
            $entry = [
                [
                    'v' => $item->jabatan,
                    'f' => "{$item->nama} \n {$item->jabatan}",
                ],
                $this->getRelation($item->jabatan), // Use the getRelation function
                $item->jabatan, // Tooltip
            ];

            array_push($result, $entry);
        }

        $komisiMembers = [
            'Ketua Komisi 1' => ['Anggota Komisi 1.1', 'Anggota Komisi 1.2', 'Anggota Komisi 1.3'],
            'Ketua Komisi 2' => ['Anggota Komisi 2.1', 'Anggota Komisi 2.2', 'Anggota Komisi 2.3'],
            // ... Add more Komisi entries and their members
        ];

        foreach ($komisiMembers as $komisi => $members) {
            $komisiLeader = $data->firstWhere('jabatan', $komisi);

            if ($komisiLeader) {
                foreach ($members as $member) {
                    $memberData = $data->firstWhere('jabatan', $member);
                    if ($memberData) {
                        $entry = [
                            [
                                'v' => $member,
                                'f' => "{$memberData->nama} \n {$member}",
                            ],
                            $this->getRelation($komisi), // Use the getRelation function
                            $member, // Tooltip
                        ];
                        array_push($result, $entry);
                    }
                }
            }
        }

        // ... Add more Komisi entries and their members

        return $result;
    }


    public function store(Request $request)
    {
        //\Log::info('store', $request->all());
        DB::beginTransaction();
        try {
            $this->validationException(Validator::make(
                $request->all(),
                [
                    'nama'     => 'required',
                    'jabatan'  => 'required',
                    'pendidikan'  => 'required',
                    'periode' => 'required',
                    'foto'  => 'required',
                ],
                [
                    'nama.required'     => 'Nama Kosong',
                    'jabatan.required'  => 'Jabatan Kosong',
                    'pendidikan.required'     => 'Pendidikan Kosong',
                    'periode' => 'Periode Kosong',
                    'foto.required'     => 'Foto Kosong',
                ]
            ));

            $file = $request->file('foto');
            $fileName = clean_file_name($file->getClientOriginalName());
            $saveName = "/img/keanggotaan/" . $fileName;
            $destinationPath = public_path('/img/keanggotaan');
            $file->move($destinationPath, $fileName);
            $data = [
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'pendidikan' => $request->pendidikan,
                'periode' => $request->periode,
                'foto_name' => $fileName,
                'foto_path' => $saveName,
                'created_user' => $request->header('userId'),
                'modified_user' => $request->header('userId'),
            ];

            Keanggotaan::create($data);

            DB::commit();

            return $this->successResponse();
        } catch (Throwable $e) {
            DB::rollBack();
            if (isset($fileName) && is_file($fileName) && file_exists($fileName)) {
                unlink(public_path('/img/keanggotaan') . $fileName);
            }

            return $this->exceptionResponse($e);
        }
    }
    public function getRelation($jabatan)
    {
        if ($jabatan == "Ketua Senat") {
            return ""; // Ketua Senat doesn't have a manager
        } else if (strtolower($jabatan) == "sekretaris senat") {
            return "Ketua Senat"; // Manager for Sekertaris Senat is Ketua Senat
        } else if (strpos(strtolower($jabatan), "ketua komisi") === 0) {
            // Handle Ketua Komisi
            // Example: "Ketua Komisi A", "Ketua Komisi B"

            // Get the identifier of the komisi
            $komisiIdentifier = substr($jabatan, -1);
            return "Sekretaris Senat"; // Manager for Ketua Komisi is Sekertaris Senat
        } else if (strpos(strtolower($jabatan), "anggota komisi") === 0) {
            // Handle anggota Komisi
            // Example: "Anggota Komisi A", "Anggota Komisi B"

            // Get the identifier of the komisi
            $komisiIdentifier = substr($jabatan, -1);
            return "Ketua Komisi $komisiIdentifier"; // Manager for Anggota Komisi is Ketua Komisi
        } else {
            return ""; // Default case, return null
        }
    }



    public function edit(Request $request, $id)
    {
        try {
            $this->validationException(Validator::make(
                $request->all(),
                [
                    'userId'  => 'required',
                ],
                [
                    'userId.required'  => 'User Tidak Valid',
                ]
            ));

            $anggota = Keanggotaan::find($id);
            $anggota->nama = $request->nama;
            $anggota->jabatan = $request->jabatan;
            $anggota->pendidikan = $request->pendidikan;
            $anggota->periode = $request->periode;
            $anggota->modified_user = $request->modified_user;

            if ($file = $request->file('foto')) {
                $fileName = clean_file_name($file->getClientOriginalName());
                $saveName = '/img/keanggotaan/' . md5($fileName);
                $destinationPath = public_path('/img/keanggotaan');

                $file->move($destinationPath, $fileName);

                $anggota->foto_path = $saveName;
                $anggota->foto_name = $fileName;
            }

            $anggota->save();
            return $this->successResponse();
        } catch (Throwable $e) {
            DB::rollBack();
            return $this->exceptionResponse($e);
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $anggota = Keanggotaan::find($id);
            $anggota->delete();

            return $this->successResponse();
        } catch (Throwable $e) {
            return $this->exceptionResponse($e);
        }
    }
}
