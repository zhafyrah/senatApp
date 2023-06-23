<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenSenat extends BaseModel
{
    use HasFactory;

    protected $table = 'dokumen_senat';

    protected $fillable = [
        'no_surat',
        'dokumen_path',
        'dokumen_name',
        'dokumen_url',
        'keterangan',
        'created_user',
        'modified_user'
    ];

    private function main($query) {
        return $query
            ->leftJoin('users', 'users.id', '=', 'dokumen_senat.created_user')
            ->select('dokumen_senat.*')
            ->selectRaw("CONCAT(users.first_name, ' ', users.last_name) as nama_user");
    }

    public function scopeList($query) {
        $data = $this->main($query)->paginate(10);
        return $data;
    }

    public function scopeSingleRow($query, $id) {
        $data = $this->main($query)->where('dokumen_senat.id', $id)->first();
        return $data;
    }
}