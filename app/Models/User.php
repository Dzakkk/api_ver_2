<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'biodata';
    protected $primaryKey = 'nik';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [    
        'nik',
        'nama',
        'password',
        'nip',
        'tempat_lahir',
        'tanggal_lahir',
        'status_perkawinan',
        'kartu_pegawai',
        'TMT_KGB_terakhir',
        'kenaikan_KGB_YAD',
        'TMT_pensiun',
        'kode_pangkat',
        'kode_pendidikan',
    ];

    /**
     * Get the didik that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function didik(): BelongsTo
    {
        return $this->belongsTo(pendidikan::class, 'kode_pendidikan', 'kode_pendidikan');
    }

    /**
     * Get the jabatan that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jabatan(): BelongsTo
    {
        return $this->belongsTo(pangkat::class, 'kode_pangkat', 'kode_pangkat');
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
}
