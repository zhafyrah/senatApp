<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FungsiKerja extends Model
{
    use HasFactory;

    protected $table = 'fungsi_kerja';

    protected $fillable = [
        'komisi',
        'fungsi_kerja',
        'nama_komisi',
        'ketua_komisi',
        'created_user',
        'modified_user'
    ];

    protected $dates = ['created_at'];

    public function users()
    {
        return $this->belongsTo(User::class, 'created_user');
    }

    public function anggota()
    {
        return $this->hasMany(AnggotaFungsiKerja::class, 'fungsi_kerja_id');
    }

    public function scopeList($query)
    {
        return $query
            ->with('users')
            ->withCount('anggota')
            ->paginate(5);
    }

    public function scopeSingleRow($query, $id)
    {
        return $query
            ->with('users')
            ->with('anggota')
            ->findOrFail($id);
    }
}
