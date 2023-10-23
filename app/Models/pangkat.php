<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pangkat extends Model
{
    use HasFactory;
    protected $dates = ['created_at'];

    protected $table = 'pangkat';
    protected $keyType = 'string';
    protected $primaryKey = 'kode_pangkat';
    public $incrementing = false;
    protected $fillable = [
        'kode_pangkat',
        'pangkat',
        'golongan',
        'TMT',
        'jabatan',
    ];
}
