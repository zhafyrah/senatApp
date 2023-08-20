<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenKomisi extends BaseModel
{
    use HasFactory;

    protected $table = 'dokumen_komisi';

    protected $fillable = [
        'no_surat',
        'dokumen_path',
        'dokumen_name',
        'dokumen_url',
        'keterangan',
        'tanggal_unggah',
        'created_user',
        'modified_user'
    ];

    private function main($query)
    {
        return $query
            ->leftJoin('users', 'users.id', '=', 'dokumen_komisi.created_user')
            ->select('dokumen_komisi.*')
            ->selectRaw("DATE(dokumen_komisi.tanggal_unggah) as tanggal_unggah")
            ->selectRaw("users.nama as nama_user")
            ->selectRaw("CONCAT('" . url('') . "', dokumen_path) as dokumen_url");
    }

    public function scopeList($query)
    {
        $data = $this->main($query)->paginate(10);
        return $data;
    }

    public function scopeSingleRow($query, $id)
    {
        $data = $this->main($query)->where('dokumen_komisi.id', $id)->first();
        return $data;
    }
}
