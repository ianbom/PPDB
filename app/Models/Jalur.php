<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jalur extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_jalur';
    protected $table = 'jalur';

    protected $fillable = [
    'nama_jalur',
    'biaya',
    'deskripsi'
    ];

    public function user(){
        return $this->hasMany(User::class, 'id_jalur', 'id_jalur');
    }
}
