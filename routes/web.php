<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Dashboard (umum)
Route::get('/home', 'HomeController@index')->name('home');

// Profile
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

// About Page
Route::get('/about', function () {
    return view('about');
})->name('about');

/*
|--------------------------------------------------------------------------
| Group Routes Berdasarkan Role
|--------------------------------------------------------------------------
*/

// === Admin Only ===
Route::middleware(['role:Admin'])->group(function () {
    Route::resource('jenis', 'JenisController');
    Route::resource('klaster', 'KlasterController');
    Route::resource('laporan', 'LaporanController');
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');

});


// === Surveyor Only ===
Route::middleware(['role:Surveyor'])->group(function () {
    Route::resource('pohon', 'PohonController');
    Route::resource('pertumbuhan', 'PertumbuhanController');
    Route::resource('tanah', 'TanahController');
    Route::resource('mortalitas', 'MortalitasController');
    Route::resource('keanekaragaman', 'KeanekaragamanController');
    Route::resource('kerusakan', 'KerusakanController');
    Route::resource('tajuk', 'TajukController');
});

// === Pengelola Data ===
Route::middleware(['role:Pengelola'])->group(function () {
    Route::get('laporan', 'LaporanController@index')->name('laporan.index');
    Route::get('laporan/{laporan}', 'LaporanController@show')->name('laporan.show');
    // atau proteksi validasi saja
});
