<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PeriodePerkuliahan;
use App\Http\Controllers\Controller;

class PeriodePerkuliahanController extends Controller
{
    public function index()
    {
        $periode_perkuliahan = PeriodePerkuliahan::get();

        $message = ['message' => 'success', 'data' => $periode_perkuliahan];

        return response()->json($message);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id_prodi' => 'required|exists:App\Models\Prodi,id_prodi',
            'id_semester' => 'required|exists:App\Models\Semester,id_semester',
            'jumlah_target_mahasiswa_baru' => 'required|integer',
            'jumlah_pendaftar_ikut_seleksi' => 'required|integer',
            'jumlah_pendaftar_lulus_seleksi' => 'required|integer',
            'jumlah_daftar_ulang' => 'required|integer',
            'jumlah_mengundurkan_diri' => 'required|integer',
            'tanggal_awal_perkuliahan' => 'required|date',
            'tanggal_akhir_perkuliahan' => 'required|date',
        ]);

        $id_periode = Str::uuid();
        $savePeriode = PeriodePerkuliahan::create($validateData);
        $savePeriode->id_periode = $id_periode;
        $savePeriode->save();

        $message = ['message'=>'success','id_periode'=>$id_periode];

        return response()->json($message,201);

    }

    public function updateData(Request $request,$semester,$prodi){
        $validateData = $request->validate([
            'jumlah_target_mahasiswa_baru' => 'integer',
            'jumlah_pendaftar_ikut_seleksi' => 'integer',
            'jumlah_pendaftar_lulus_seleksi' => 'integer',
            'jumlah_daftar_ulang' => 'integer',
            'jumlah_mengundurkan_diri' => 'integer',
            'tanggal_awal_perkuliahan' => 'date',
            'tanggal_akhir_perkuliahan' => 'date',
        ]);

        $periode = PeriodePerkuliahan::where('id_semester',$semester)->where('id_prodi',$prodi);

        if($periode->count() == 0){
            return response()->json(['message' =>'Data periode perkuliahan tidak ditemukan']);
        }

        if(empty($request->all())){
            return response()->json(['message'=>'Tidak ada data yang dikirimkan']);
        }

        $periode->update($request->all());

        $message = ['message'=>'success','id_periode'=>$periode->pluck('id_periode')];

        return response()->json($message,200);
    }

    public function deleteData(Request $request,$semester,$prodi){
        $periode = PeriodePerkuliahan::where('id_semester',$semester)->where('id_prodi',$prodi);

        if($periode->count() == 0){
            return response()->json(['message' =>'Data periode perkuliahan tidak ditemukan']);
        }

        $periode->delete();

        return response()->json(null, 204);
    }
}
