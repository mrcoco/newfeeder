<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RiwayatPendidikanMahasiswa;

class RiwayatPendidikanMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riwayat_pendidikan = RiwayatPendidikanMahasiswa::get();

        $message = ['message'=>'success','data'=>$riwayat_pendidikan];

        return response()->json($message);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id_mahasiswa' => 'required',
            'nim' => 'required',
            'id_jenis_pendaftaran' => 'required',
            'id_jalur_masuk' => 'required',
            'id_semester' => 'required',
            'tanggal_daftar' => 'required|date',
            'id_prodi' => 'required',
            'biaya_masuk' => 'required|integer'
        ]);

        $id_riwayat = Str::uuid();
        $riwayatpendidikan = RiwayatPendidikanMahasiswa::create($validateData);
        $riwayatpendidikan->id_riwayat = $id_riwayat;
        $riwayatpendidikan->save();

        $message = ['message' =>'success','id_riwayat'=>$id_riwayat];
        return response()->json($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RiwayatPendidikanMahasiswa  $riwayatPendidikanMahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(RiwayatPendidikanMahasiswa $riwayatPendidikanMahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RiwayatPendidikanMahasiswa  $riwayatPendidikanMahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RiwayatPendidikanMahasiswa $riwayatPendidikanMahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RiwayatPendidikanMahasiswa  $riwayatPendidikanMahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(RiwayatPendidikanMahasiswa $riwayatPendidikanMahasiswa)
    {
        //
    }
}
