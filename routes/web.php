<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorScheduleController;
use App\Http\Controllers\PatientController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.auth.login');
});


// Route::get('/login', function () {
//     return view('pages.auth.login');
// }); //kita hapus karena sudah diurus oleh Fortify (setelah kita install fortify)

Route::middleware(['auth'])->group(function () {

    route::get('home', function () {
        return view('dashboard');
    })->name('home');

    Route::resource('users', UserController::class);
    //agar tidak terjadi error Undefined type 'UserController'.
    //maka harus import dulu use App\Http\Controllers\UserController;


    //route untuk 'doctors'
    Route::resource('doctors', DoctorController::class);
    //import                 use App\Http\Controllers\DoctorController; //taro di baris atas


    //route untuk 'doctor-schedules'
    Route::resource('doctor-schedules', DoctorScheduleController::class);
    //import                 use App\Http\Controllers\DoctorScheduleController; //taro di baris atas

    //route untuk 'patients  '
    Route::resource('patients', PatientController::class);
    //import                 use App\Http\Controllers\PatientController; //taro di baris atas
    //atau tulis Route::resource('patients', App\Http\Controllers\PatientController::class);
});
