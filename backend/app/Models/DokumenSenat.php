<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenSenat extends BaseModel
{
    use HasFactory;

    protected $table = 'dokumen_senat';

    protected $fillable = [
        'judul_dokumen',
        'dokumen_path',
        'dokumen_name',
        'dokumen_url',
        'tanggal_unggah',
        'keterangan',
        'link_url',
        'created_user',
        'modified_user'
    ];

    private function main($query)
    {
        return $query
            ->leftJoin('users', 'users.id', '=', 'dokumen_senat.created_user')
            ->select('dokumen_senat.*')
            ->selectRaw("DATE(dokumen_senat.tanggal_unggah) as tanggal_unggah")
            ->selectRaw("users.nama as nama_user")
            ->selectRaw("CONCAT('" . url('') . "', dokumen_path) as dokumen_url");
    }

    public function getFotoUrlAttribute($image)
    {
        return asset($image);
    }

    public function scopeList($query)
    {
        $data = $this->main($query)->paginate(10);
        return $data;
    }

    public function getFotoPathAttribute($image)
    {
        return asset($image);
    }

    public function scopeSingleRow($query, $id)
    {
        $data = $this->main($query)->where('dokumen_senat.id', $id)->first();
        return $data;
    }
}
