<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'nip',
        'email',
        'password',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        //'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    private function main($query)
    {
        return $query
            ->leftJoin('users_roles', 'users.id', '=', 'users_roles.users_id')
            ->leftJoin('roles', 'users_roles.roles_id', '=', 'roles.id')
            ->select('users.*', 'roles.role')
            ->selectRaw("DATE(users.created_at) as tanggal_unggah")
            ->selectRaw("users.nama as nama_user, roles.id as role_id");
    }

    public function scopeList($query, $currentUserId)
    {
        $data = $this->main($query)->whereRaw("users.id <> $currentUserId")->paginate(10);
        return $data;
    }

    public function scopeSingleRow($query, $id)
    {
        $data = $this->main($query)->where('users.id', $id)->first();
        return $data;
    }
}
