<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends BaseModel {
    use HasFactory;

    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'isi',
        'tanggal_unggah',
        'foto_name',
        'foto_url',
        'foto_path',
        'created_user',
        'modified_user'
    ];

    private function main($query) {
        return $query
            ->leftJoin('users', 'users.id', '=', 'berita.created_user')
            ->select('berita.*')
            ->selectRaw("DATE(berita.created_at) as tanggal_unggah")
            ->selectRaw("users.nama as nama_user");
    }

    public function scopeList($query) {
        $data = $this->main($query)->paginate(10);
        return $data;
    }

    public function scopeSingleRow($query, $id) {
        $data = $this->main($query)->where('berita.id', $id)->first();
        return $data;
    }
}
