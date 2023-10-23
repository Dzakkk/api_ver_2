<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class biodataDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'nik' => $this->nik,
            'nama' => $this->nama,
            'jenis_kelamin' => $this->jenis_kelamin,
            'nip' => $this->nip,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'status_perkawinan' => $this->status_perkawinan,
            'kartu_pegawai' => $this->kartu_pegawai,
            'TMT_KGB_terakhir' => $this->TMT_KGB_terakhir,
            'kenaikan_KGB_YAD' => $this->kenaikan_KGB_YAD,
            'TMT_pensiun' => $this->TMT_pensiun,
            'jabatan' => $this->whenLoaded('jabatan'),
            'didik' => $this->whenLoaded('didik'),
        ];
    }
}
