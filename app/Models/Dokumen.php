<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_dokumen';
    protected $table = 'dokumen';

    protected $fillable = [
    'id',
    'tipe_dokumen',
    'file'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id', 'id');
    }
}
