<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarDokumenKomisi extends BaseModel
{
    use HasFactory;

    protected $table = 'komentar_dokumen_komisi';

    protected $fillable = [
        'dokumen_komisi_id',
        'user_id',
        'komentar',
        'attachment_name',
        'attachment_path',
        'attachment_url'
    ];

    private function main($query)
    {
        return $query
            ->leftJoin('users', 'users.id', '=', 'komentar_dokumen_komisi.user_id')
            ->leftJoin('dokumen_komisi', 'dokumen_komisi.id', '=', 'komentar_dokumen_komisi.dokumen_komisi_id')
            ->select('komentar_dokumen_komisi.*')
            ->selectRaw("DATE(komentar_dokumen_komisi.created_at) as tanggal")
            ->selectRaw("users.nama as nama_user, dokumen_komisi.no_surat");
    }

    public function scopeList($query)
    {
        $data = $this->main($query)->paginate(100);
        return $data;
    }

    public function scopeSingleRow($query, $id)
    {
        $data = $this->main($query)->where('komentar_dokumen_komisi.id', $id)->first();
        return $data;
    }
}
