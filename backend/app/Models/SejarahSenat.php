<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SejarahSenat extends Model
{
    use HasFactory;

    protected $table = 'sejarah_senat';

    protected $fillable = [
        'judul',
        'isi',
        'foto_name',
        'foto_path',
        'foto_url',
        'created_user',
        'modified_user'
    ];

    private function main($query)
    {
        return $query
            ->leftJoin('users', 'users.id', '=', 'sejarah_senat.created_user')
            ->select('sejarah_senat.*')
            ->selectRaw("DATE(sejarah_senat.created_at) as tanggal_unggah")
            ->selectRaw("users.nama as nama_user")
            ->selectRaw("CONCAT('" . url('') . "', foto_path) as foto_url");
    }

    public function scopeList($query)
    {
        $data = $this->main($query)->paginate(10);
        return $data;
    }

    public function scopeSingleRow($query, $id)
    {
        $data = $this->main($query)->where('sejarah_senat.id', $id)->first();
        return $data;
    }
}
