<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends BaseModel
{
    use HasFactory;

    protected $table = 'gallery';

    protected $fillable = [
        'keterangan',
        'foto_name',
        'foto_path',
        'foto_url',
        'created_user',
        'modified_user'
    ];

    private function main($query)
    {
        return $query
            ->leftJoin('users', 'users.id', '=', 'gallery.created_user')
            ->select('gallery.*')
            ->selectRaw("DATE(gallery.created_at) as tanggal_unggah")
            ->selectRaw("users.nama as nama_user");
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
        $data = $this->main($query)->where('gallery.id', $id)->first();
        return $data;
    }
}
