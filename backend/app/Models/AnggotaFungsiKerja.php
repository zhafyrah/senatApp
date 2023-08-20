<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaFungsiKerja extends Model
{
    use HasFactory;
    protected $table = 'anggota_fungsi_kerja';
    public function fungsiKerja()
    {
        return $this->belongsTo(FungsiKerja::class, 'fungsi_kerja_id');
    }
}
