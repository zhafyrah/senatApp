<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenPleno extends BaseModel
{
    use HasFactory;

    protected $table = 'dokumen_pleno';

    protected $fillable = [
        'no_surat',
        'dokumen_path',
        'dokumen_name',
        'dokumen_url',
        'keterangan',
        'status',
        'created_user',
        'modified_user'
    ];

    private function main($query) {
        return $query
            ->leftJoin('users', 'users.id', '=', 'dokumen_pleno.created_user')
            ->select('dokumen_pleno.*')
            ->selectRaw("DATE(dokumen_pleno.created_at) as tanggal_unggah")
            ->selectRaw("users.nama as nama_user");
    }

    public function scopeList($query) {
        $data = $this->main($query)->paginate(10);
        return $data;
    }

    public function scopeSingleRow($query, $id) {
        $data = $this->main($query)->where('dokumen_pleno.id', $id)->first();
        return $data;
    }
}
