<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarDokumenPleno extends BaseModel
{
    use HasFactory;

    protected $table = 'komentar_dokumen_pleno';

    protected $fillable = [
        'dokumen_pleno_id',
        'user_id',
        'komentar',
        'attachment_name',
        'attachment_path',
        'attachment_url'
    ];

    private function main($query)
    {
        return $query
            ->leftJoin('users', 'users.id', '=', 'komentar_dokumen_pleno.user_id')
            ->leftJoin('dokumen_pleno', 'dokumen_pleno.id', '=', 'komentar_dokumen_pleno.dokumen_pleno_id')
            ->select('komentar_dokumen_pleno.*')
            ->selectRaw("DATE(dokumen_pleno.tanggal_unggah) as tanggal_unggah")
            ->selectRaw("users.nama as nama_user, dokumen_pleno.no_surat");
    }

    public function scopeList($query)
    {
        $data = $this->main($query)->paginate(100);
        return $data;
    }

    public function scopeSingleRow($query, $id)
    {
        $data = $this->main($query)->where('komentar_dokumen_pleno.id', $id)->first();
        return $data;
    }
}
