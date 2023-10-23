<?php

namespace App\Http\Controllers;

use App\Http\Resources\biodataDetailResource;
use App\Http\Resources\biodataResource;
use App\Models\pangkat;
use App\Models\pendidikan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class BiodataController extends Controller
{
    public function index()
    {
        $biodata = User::all();
        return biodataResource::collection($biodata);
    }

    public function store1(Request $request)
    {
        $bio = new User;

        $bio->nik = $request->nik;
        $bio->nama = $request->nama;
        $bio->password = Hash::make($request->password);
        $bio->jenis_kelamin = $request->jenis_kelamin;
        $bio->tanggal_lahir = $request->tanggal_lahir;
        $bio->tempat_lahir = $request->tempat_lahir;
        $bio->nip = $request->nip;
        $bio->kartu_pegawai = $request->kartu_pegawai;
        $bio->status_perkawinan = $request->status_perkawinan;
        $bio->TMT_KGB_terakhir = $request->TMT_KGB_terakhir;
        $bio->kenaikan_KGB_YAD = $request->kenaikan_KGB_YAD;
        $bio->TMT_pensiun = $request->TMT_pensiun;
        $bio->kode_pendidikan = $request->kode_pendidikan;
        $bio->kode_pangkat = $request->kode_pangkat;

        $bio->save();
        return response()->json([
            "massage" => "User added"
        ], 201);
    }

    // public function store(Request $request)
    // {
    //     // Validate the incoming request data for the User model
    //     $validatedUserData = $request->validate([
    //         'nik' => 'required',
    //         'nama' => 'required',
    //         'password' => 'required',
    //         'nip' => 'required',
    //         'tempat_lahir' => 'required',
    //         'tanggal_lahir' => 'required',
    //         'status_perkawinan' => 'required',
    //         'kartu_pegawai' => 'required',
    //         'TMT_KGB_terakhir' => 'required',
    //         'kenaikan_KGB_YAD' => 'required',
    //         'kode_pangkat' => 'required',
    //         'kode_pendidikan' => 'required',
    //     ]);

    //     // Validate the incoming request data for the pendidikan model
    //     $validatedPendidikanData = $request->validate([
    //         'kode_pendidikan' => 'required',
    //         'nama_pendidikan' => 'required',
    //         'gelar' => 'required',
    //         'tanggal_lulus' => 'required',
    //     ]);

    //     // Validate the incoming request data for the pangkat model
    //     $validatedPangkatData = $request->validate([
    //         'kode_pangkat' => 'required',
    //         'pangkat' => 'required',
    //         'golongan' => 'required',
    //         'TMT' => 'required',
    //         'jabatan' => 'required',
    //     ]);

    //     // Create a new User
    //     $user = User::create($validatedUserData);

    //     // Create or update the associated pendidikan record
    //     $user->didik()->updateOrcreate(
    //         ['kode_pendidikan' => $validatedPendidikanData['kode_pendidikan']],
    //         $validatedPendidikanData
    //     );

    //     // Create or update the associated pangkat record
    //     $user->jabatan()->updateOrcreate(
    //         ['kode_pangkat' => $validatedPangkatData['kode_pangkat']],
    //         $validatedPangkatData
    //     );

    //     return response()->json(['message' => 'User created successfully'], 201);
    // }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'password' => 'required',
            'nip' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'status_perkawinan' => 'required',
            'kartu_pegawai' => 'required',
            'TMT_KGB_terakhir' => 'required',
            'kenaikan_KGB_YAD' => 'required',
            'TMT_pensiun' => 'required',
            'kode_pendidikan' => 'required',
            'kode_pangkat' => 'required',
            'nama_pendidikan' => 'required',
            'gelar' => 'required',
            'tanggal_lulus' => 'required',
            'pangkat' => 'required',
            'golongan' => 'required',
            'TMT' => 'required',
            'jabatan' => 'required',
        ]);

        // Create a new User
        $user = User::create([
            'nik' => $validatedData['nik'],
            'nama' => $validatedData['nama'],
            'password' => bcrypt($validatedData['password']),
            'nip' => $validatedData['nip'],
            'tempat_lahir' => $validatedData['tempat_lahir'],
            'tanggal_lahir' => $validatedData['tanggal_lahir'],
            'status_perkawinan' => $validatedData['status_perkawinan'],
            'kartu_pegawai' => $validatedData['kartu_pegawai'],
            'TMT_KGB_terakhir' => $validatedData['TMT_KGB_terakhir'],
            'kenaikan_KGB_YAD' => $validatedData['kenaikan_KGB_YAD'],
            'TMT_pensiun' => $validatedData['TMT_pensiun'],
            'kode_pangkat' => $validatedData['kode_pangkat'],
            'kode_pendidikan' => $validatedData['kode_pendidikan'],

        ]);

        // Create the associated pendidikan record
        $pendidikan = pendidikan::create([
            'kode_pendidikan' => $validatedData['kode_pendidikan'],
            'nama_pendidikan' => $validatedData['nama_pendidikan'],
            'gelar' => $validatedData['gelar'],
            'tanggal_lulus' => $validatedData['tanggal_lulus'],
        ]);

        // Create the associated pangkat record
        $pangkat = pangkat::create([
            'kode_pangkat' => $validatedData['kode_pangkat'],
            'pangkat' => $validatedData['pangkat'],
            'golongan' => $validatedData['golongan'],
            'TMT' => $validatedData['TMT'],
            'jabatan' => $validatedData['jabatan'],
        ]);

        return response()->json(['message' => 'Data inserted successfully'], 201);
    }

    // public function update(Request $request, $id)
    // {
    //     if (User::where('nik', $id)->exists()) {
    //         $bio = User::find($id);
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

    public function update(Request $request, $id)
    {
        // Find the user by 'nik'
        $user = User::where('nik', $id)->first();

        if (!$user) {
            return response()->json([
                "message" => "User not found"
            ], 404);
        }

        // Validate and update User data
        $user->update($request->only([
            'nama',
            'nip',
            'jenis_kelamin',
            'status_perkawinan',
            'tempat_lahir',
            'tanggal_lahir',
            'kartu_pegawai',
            'TMT_KGB_terakhir',
            'kenaikan_KGB_YAD',
            'TMT_pensiun'
        ]));

        // Update the associated pendidikan record
        $user->didik->update($request->only([
            'nama_pendidikan',
            'gelar',
            'tanggal_lulus'
        ]));

        // Update the associated pangkat record
        $user->jabatan->update($request->only([
            'pangkat',
            'golongan',
            'TMT',
            'jabatan'
        ]));

        return response()->json([
            "message" => "User and related data updated"
        ], 204);
    }


    public function show($id)
    {
        try {
            $User = User::with('didik', 'jabatan')->where('nik', $id)->first();

            if (!$User) {
                return response()->json(["message" => "User not found"], 404);
            }

            return new biodataDetailResource($User);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(["message" => "An error occurred", "error" => $e->getMessage()], 500);
        }
    }



    public function destroy($id)
    {
        // Find the user by 'nik'
        $user = User::where('nik', $id)->first();
    
        if (!$user) {
            return response()->json([
                "message" => "User not found"
            ], 404);
        }
    
        // Delete the associated pendidikan and pangkat records
        $user->didik->delete();
        $user->jabatan->delete();
    
        // Finally, delete the user record
        $user->delete();
    
        return response()->json([
            "message" => "User and related data deleted"
        ], 202);
    }
    
}
