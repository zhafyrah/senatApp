<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'anggota';

    protected $fillable = [
        'keanggotaan_id',
        'nama',
        'jabatan',
        'pendidikan',
        'foto_name',
        'foto_path',
        'foto_url',
        'created_user',
        'modified_user'
    ];

    private function main($query) {
        return $query
            ->leftJoin('users', 'users.id', '=', 'anggota.created_user')
            ->select('anggota.*')
            ->selectRaw("DATE(anggota.created_at) as tanggal_unggah")
            ->selectRaw("users.nama as nama_user");
    }

    public function scopeList($query) {
        $data = $this->main($query)->paginate(10);
        return $data;
    }

    public function scopeSingleRow($query, $id) {
        $data = $this->main($query)->where('anggota.id', $id)->first();
        return $data;
    }

    public function scopeByKeanggotaanId($query, $keanggotaanId){
        $data = $this->main($query)->where('anggota.keanggotaan_id', $keanggotaanId)->get();
        return $data;
    }
}
