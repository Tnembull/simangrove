<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', fn () => view('welcome'));
Auth::routes();

// === SHARED ROUTES (All Authenticated Users) ===
Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/about', fn () => view('about'))->name('about');
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::put('/profile', 'ProfileController@update')->name('profile.update');
});

// === ADMIN ONLY ===
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::resource('assessment-parameters', 'AssessmentParameterController');
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('locations', 'LocationController');
    Route::resource('units', 'UnitController');
    Route::resource('species', 'SpeciesController');
});

// === ADMIN & SURVEYOR ===
Route::middleware(['auth', 'role:Admin|Surveyor'])->group(function () {
    Route::resource('measurement-sessions', 'MeasurementSessionController');
    Route::resource('plots', 'PlotController');
    Route::resource('plot-points', 'PlotPointController');
    Route::resource('reference-points', 'ReferencePointController');
});

// === SURVEYOR ONLY ===
Route::middleware(['auth', 'role:Surveyor'])->group(function () {
    Route::resource('growth-observations', 'GrowthObservationController');
    Route::resource('canopy-observations', 'CanopyObservationController'); 
    Route::resource('damage-observations', 'DamageObservationController'); 
    Route::resource('mortality-observations', 'MortalityObservationController');
    Route::resource('site-qualities', 'SiteQualityController');
    Route::resource('regeneration-records', 'RegenerationRecordController');
    Route::resource('fauna-observations', 'FaunaObservationController');
    Route::resource('plot-documents', 'PlotDocumentController');
    Route::resource('point-assessments', 'PointAssessmentController');
});


// === ADMIN & PENGELOLA ===
Route::middleware(['auth', 'role:Admin|Pengelola'])->group(function () {
    Route::resource('review', 'ReviewController');
    Route::resource('verification', 'VerificationController');
    Route::resource('health-assessments', 'PlotSummaryScoreController');
    Route::resource('visualization', 'VisualizationController');
    Route::resource('reports', 'ReportController');
    Route::resource('export', 'ExportController');
    Route::resource('recap', 'RecapController');
});
