<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FungsiKerja extends Model
{
    use HasFactory;

    protected $table = 'fungsi_kerja';

    protected $fillable = [
        'komisi',
        'fungsi_kerja',
        'ketua_komisi',
        'nama_anggota1',
        'nama_anggota2',
        'nama_anggota3',
        'created_user',
        'modified_user'
    ];

    private function main($query) {
        return $query
            ->leftJoin('users', 'users.id', '=', 'fungsi_kerja.created_user')
            ->select('fungsi_kerja.*')
            ->selectRaw("DATE(fungsi_kerja.created_at) as tanggal_unggah")
            ->selectRaw("users.nama as nama_user");
    }

    public function scopeList($query) {
        $data = $this->main($query)->paginate(10);
        return $data;
    }

    public function scopeSingleRow($query, $id) {
        $data = $this->main($query)->where('fungsi_kerja.id', $id)->first();
        return $data;
    }
}
