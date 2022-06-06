<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Agama;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AgamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agama = Agama::select('id','nama_agama')->get();

        $message = ['message'=>'success','data'=>$agama];

        return response()->json($message);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nama_agama' => 'required|unique:agamas,nama_agama',

        ]);

        $uuid = Str::uuid();

        $agama = Agama::create([
            'nama_agama' => $request->nama_agama,
            'id_agama' => $uuid
        ]);

        $agamaId = Agama::where('id',$agama->id)->pluck('id_agama');

        $message = ['message'=>'success','id_agama'=>$agamaId];

        return response()->json($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\agama  $agama
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agama = Agama::select('id','nama_agama')->find($id);

        $message = ['message'=>'success','data'=>$agama];

        return response()->json($message);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\agama  $agama
     * @return \Illuminate\Http\Response
     */
    public function edit(agama $agama)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\agama  $agama
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, agama $agama)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\agama  $agama
     * @return \Illuminate\Http\Response
     */
    public function destroy(agama $agama)
    {
        //
    }
}
