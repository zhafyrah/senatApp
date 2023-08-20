<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keanggotaan extends BaseModel
{
    use HasFactory;

    protected $table = 'keanggotaan';

    protected $fillable = [
        'nama',
        'jabatan',
        'pendidikan',
        'periode',
        'foto_name',
        'foto_path',
        'foto_url',
        'created_user',
        'modified_user'
    ];

    private function main($query)
    {
        return $query
            ->leftJoin('users', 'users.id', '=', 'keanggotaan.created_user')
            ->select('keanggotaan.*')
            ->selectRaw("DATE(keanggotaan.created_at) as tanggal_unggah")
            ->selectRaw("users.nama as nama_user");
    }
    public function getFotoPathAttribute($image)
    {
        return asset($image);
    }

    public function scopeList($query)
    {
        $data = $this->main($query)->paginate(10);
        return $data;
    }

    public function scopeSingleRow($query, $id)
    {
        $data = $this->main($query)->where('keanggotaan.id', $id)->first();
        return $data;
    }

    public function anggota()
    {
        return $this->hasMany(Anggota::class);
    }
}
