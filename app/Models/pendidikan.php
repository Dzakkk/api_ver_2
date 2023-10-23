<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendidikan extends Model
{
    use HasFactory;
    protected $dates = ['created_at'];

    protected $table = 'pendidikan';
    protected $keyType = 'string';
    protected $primaryKey = 'kode_pendidikan';
    public $incrementing = false;
    protected $fillable = [
        'kode_pendidikan',
        'nama_pendidikan',
        'gelar',
        'tanggal_lulus',
    ];
}
