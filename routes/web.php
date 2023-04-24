<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/employees', [App\Http\Controllers\AngajatiController::class, 'show'])->name('employees');
    Route::get('/employee/{slug}', [App\Http\Controllers\AngajatiController::class, 'see_employee']);
    Route::put('/employee/update', [App\Http\Controllers\AngajatiController::class, 'update_employee'])->name('update-employee');
    Route::get('/show-form', [App\Http\Controllers\AngajatiController::class, 'show_form'])->name('show-form');
    Route::post('/show-form', [App\Http\Controllers\AngajatiController::class, 'add_employee'])->name('add-employee');
    Route::post('/delete-employee', [App\Http\Controllers\AngajatiController::class, 'delete_employee'])->name('delete-employee');
    Route::post('/search-employee', [App\Http\Controllers\SearchController::class, 'search_employee'])->name('search-employee');
    Route::get('/generate/{slug}', [App\Http\Controllers\GeneratePDF::class, 'show_pdf'])->name('generate-pdf');
});


