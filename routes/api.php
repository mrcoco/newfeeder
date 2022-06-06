<?php

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\BiodataMahasiswa;
use Illuminate\Support\Facades\Route;
use App\Models\RiwayatPendidikanMahasiswa;
use App\Http\Controllers\API\AgamaController;
use App\Http\Controllers\API\BiodataMahasiswaController;
use App\Http\Controllers\API\PeriodePerkuliahanController;
use App\Http\Controllers\API\RiwayatPendidikanMahasiswaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//API route for register new user
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/user', function(Request $request) {
        $user = auth()->user()->get();
        $myArray = ['error_code'=>0, 'error_desc'=>'','data'=>$user];
        return response()->json($myArray);
    });

    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
    Route::resource('/agama',AgamaController::class);

    // API route for Periode Perkuliahan
    Route::resource('/periode_perkuliahan', PeriodePerkuliahanController::class);
    Route::put('/periode_perkuliahan/{semester}/{prodi}',[PeriodePerkuliahanController::class,'updateData']);
    Route::delete('/periode_perkuliahan/{semester}/{prodi}',[PeriodePerkuliahanController::class,'deleteData']);

    //API route for Biodata Mahasiswa
    Route::resource('/biodata_mahasiswa', BiodataMahasiswaController::class);
    Route::put('/biodata_mahasiswa/{mahasiswa}',[BiodataMahasiswaController::class,'updateData']);
    Route::delete('/biodata_mahasiswa/{mahasiswa}',[BiodataMahasiswaController::class,'deleteData']);

    //API route for riwayat pendidikan mahasiswa
    Route::resource('/riwayat_pendidikan_mahasiswa', RiwayatPendidikanMahasiswaController::class);
    Route::put('/riwayat_pendidikan_mahasiswa/{mahasiswa}',[RiwayatPendidikanMahasiswa::class,'updateData']);
    Route::delete('/riwayat_pendidikan_mahasiswa/{mahasiswa}',[RiwayatPendidikanMahasiswa::class,'deleteData']);

});
