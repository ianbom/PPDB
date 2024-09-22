<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_jalur',
        'name',
        'email',
        'password',
        'foto',
        'nisn',
        'agama',
        'alamat',
        'tgl_lahir',
        'tempat_lahir',
        'gender',
        'hp',
        'sekolah',
        'status',
        'is_admin',
        'nama_ayah',
        'nama_ibu',
        'tgl_lahir_ayah',
        'tgl_lahir_ibu',
        'hp_ayah',
        'hp_ibu',
        'pendidikan_ayah',
        'pendidikan_ibu',
        'pendapatan_ayah',
        'pendapatan_ibu',
    ];

    public function dokumen(){
        return $this->hasMany(Dokumen::class, 'id', 'id');
    }

    public function jalur(){
        return $this->belongsTo(Jalur::class, 'id_jalur', 'id_jalur');
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
