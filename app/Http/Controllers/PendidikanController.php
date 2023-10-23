<?php

namespace App\Http\Controllers;

use App\Http\Resources\biodataResource;
use App\Models\pendidikan;
use Illuminate\Http\Request;

class pendidikanController extends Controller
{

    public function index()
    {
        $biodata = pendidikan::all();
        return biodataResource::collection($biodata);
    }

    public function store(Request $request)
    {
        $bio = new pendidikan;

        $bio->kode_pendidikan = $request->kode_pendidikan;
        $bio->nama_pendidikan = $request->nama_pendidikan;
        $bio->gelar = $request->gelar;
        $bio->tanggal_lulus = $request->tanggal_lulus;      

        $bio->save();
        return response()->json([
            "massage" => "pendidikan added"
        ], 201);
    }

    // public function update(Request $request, $id)
    // {
    //     if (pendidikan::where('nik', $id)->exists()) {
    //         $bio = pendidikan::find($id);
    //         $bio->nama = is_null($request->nama) ? $bio->nama : $request->nama;
    //         $bio->nip = is_null($request->nip) ? $bio->nip : $request->nip;
    //         $bio->jenis_kelamin = is_null($request->jenis_kelamin) ? $bio->jenis_kelamin : $request->jenis_kelamin;
    //         $bio->status_perkawinan = is_null($request->status_perkawinan) ? $bio->status_perkawinan : $request->status_perkawinan;
    //         $bio->tempat_lahir = is_null($request->tempat_lahir) ? $bio->tempat_lahir : $request->tempat_lahir;
    //         $bio->tanggal_lahir = is_null($request->tanggal_lahir) ? $bio->tanggal_lahir : $request->tanggal_lahir;
    //         $bio->kartu_pegawai = is_null($request->kartu_pegawai) ? $bio->kartu_pegawai : $request->kartu_pegawai;
    //         $bio->TMT_KGB_terakhir = is_null($request->TMT_KGB_terakhir) ? $bio->TMT_KGB_terakhir : $request->TMT_KGB_terakhir;
    //         $bio->kenaikan_KGB_YAD = is_null($request->kenaikan_KGB_YAD) ? $bio->kenaikan_KGB_YAD : $request->kenaikan_KGB_YAD;
    //         $bio->TMT_pensiun = is_null($request->TMT_pensiun) ? $bio->TMT_pensiun : $request->TMT_pensiun;

    //         $bio->save();

    //         return response()->json([
    //             "massage" => "bio Updated"
    //         ], 204);
    //     } else {
    //         return response()->json([
    //             "massage" => "bio not found"
    //         ], 404);
    //     }
    // }

    public function destroy($id)
    {
        if (pendidikan::where('nik', $id)->exists()) {
            $pendidikan = pendidikan::find($id);
            $pendidikan->delete();

            return response()->json([
                "massage" => "pendidikan deleted"
            ], 202);
        } else {

            return response()->json([
                "massage" => "pendidikan not found"
            ], 404);
        }
    }
}
