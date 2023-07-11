<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarDokumenSenat extends BaseModel
{
    use HasFactory;

    protected $table = 'komentar_dokumen_senat';

    protected $fillable = [
        'dokumen_senat_id',
        'user_id',
        'komentar',
        'attachment_name',
        'attachment_path',
        'attachment_url'
    ];

    private function main($query) {
        return $query
            ->leftJoin('users', 'users.id', '=', 'komentar_dokumen_senat.user_id')
            ->leftJoin('dokumen_senat', 'dokumen_senat.id', '=', 'komentar_dokumen_senat.dokumen_senat_id')
            ->select('komentar_dokumen_senat.*')
            ->selectRaw("DATE(komentar_dokumen_senat.created_at) as tanggal")
            ->selectRaw("users.nama as nama_user, dokumen_senat.no_surat");
    }

    public function scopeList($query) {
        $data = $this->main($query)->paginate(10);
        return $data;
    }

    public function scopeSingleRow($query, $id) {
        $data = $this->main($query)->where('komentar_dokumen_senat.id', $id)->first();
        return $data;
    }
}
