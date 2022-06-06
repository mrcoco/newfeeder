<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\BiodataMahasiswa;
use App\Http\Controllers\Controller;

class BiodataMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biodata_mahasiswa = BiodataMahasiswa::get();

        $message = ['message' => 'success','data'=>$biodata_mahasiswa];

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
            'nama_mahasiswa' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'id_agama' => 'required',
            'nik' => 'required',
            'nisn' => 'required',
            'id_kewarganegaraan' => 'required',
            'kelurahan' => 'required',
            'id_wilayah' => 'required',
            'penerima_kps' => 'required',
            'nama_ibu_kandung' => 'required',
            'id_kebutuhan_khusus_ayah' => 'required',
            'id_kebutuhan_khusus_mahasiswa' => 'required',
            'id_kebutuhan_khusus_ibu' => 'required',
        ]);

        $id_mahasiswa = Str::uuid();

        $biodatamhs = BiodataMahasiswa::create($validateData);
        $biodatamhs->id_mahasiswa = $id_mahasiswa;
        $biodatamhs->save();

        $message = ['message' => 'success','id_mahasiswa' => $id_mahasiswa ];

        return response()->json($message,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BiodataMahasiswa  $biodataMahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(BiodataMahasiswa $biodataMahasiswa)
    {

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BiodataMahasiswa  $biodataMahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $mahasiswa)
    {
        $validateData = $request->validate([
            'nama_mahasiswa' => 'string',
            'jenis_kelamin' => 'string',
            'tempat_lahir' => 'string',
            'tanggal_lahir' => 'date',
            'id_agama' => 'integer',
            'nik' => 'alphanum',
            'nisn' => 'alphanum',
            'id_kewarganegaraan' => 'integer' ,
            'kelurahan' => 'string',
            'id_wilayah' => 'integer',
            'penerima_kps' => 'integer',
            'nama_ibu_kandung' => 'string',
            'id_kebutuhan_khusus_ayah' => 'integer',
            'id_kebutuhan_khusus_mahasiswa' => 'integer',
            'id_kebutuhan_khusus_ibu' => 'integer',
        ]);
        $biodata = BiodataMahasiswa::where('id_mahasiswa',$mahasiswa);

        if($biodata->count() == 0){
            returncresponse()->json('Data mahasiswa tidak ditemukan');
        }

        if(empty($request->all())){
            return response()->json('Tidak ada data yang bisa diubah');
        }

        $biodata->update($request->all());

        $message = ['message'=>'success','id_mahasiswa'=>$biodata->pluck('id_mahasiswa')];

        return response()->json($message,200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BiodataMahasiswa  $biodataMahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($mahasiswa)
    {
        $biodata = BiodataMahasiswa::where('id_mahasiswa',$mahasiswa);

        if($biodata->count() == 0){
            return response()->json('Data mahasiswa tidak ditemukan');
        }

        $biodata->delete();

        return response()->json(null, 204);
    }
}
