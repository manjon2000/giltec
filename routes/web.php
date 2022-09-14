<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConstructionController;
use App\Http\Controllers\ProyectController;
use App\Http\Controllers\ProyectImageController;
use App\Http\Controllers\ViewController;
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

// Front-End
Route::get('/', function () {
    return view('front-end.home');
})->name('home')->middleware(['auth']);

Route::get('/obras', [App\Http\Controllers\ViewController::class, 'obras'])
->name('obras')->middleware(['auth']);


Route::get('/obras/{id}',[App\Http\Controllers\ViewController::class, 'obrasCategories'])
->name('categoriaObras')->middleware(['auth']);

Route::get('documentacion-tecnica', [App\Http\Controllers\ViewController::class, 'documentacionTecnica'])
->name('doctecnica')->middleware(['auth']);

Route::get('/documentacion-tecnica/proyectos', [App\Http\Controllers\ViewController::class, 'proyectos'])
->name('doctecnicaProyectos')->middleware(['auth']);

Route::get('/obra/{id}',[App\Http\Controllers\ViewController::class, 'viewObra'])
->name('obra')->middleware(['auth']);

Route::get('/documentacion-tecnica/proyectos/{id}',[App\Http\Controllers\ViewController::class, 'viewProyecto'])
->name('viewProyecto')->middleware(['auth']);


Route::get('empresa',[App\Http\Controllers\ViewController::class, 'empresa'])
->name('empresa')->middleware(['auth']);


Route::get('contacto', [App\Http\Controllers\ViewController::class, 'contacto'])
->name('contacto')->middleware(['auth']);

Route::post('/contacto', [App\Http\Controllers\ViewController::class, 'send'])->name('sendMail');

Route::get('politica-de-privacidad', [App\Http\Controllers\ViewController::class, 'politicaPrivacidad'])
->name('politicaPrivacidad')->middleware(['auth']);

Route::get('terminos-legales-tecnicos', [App\Http\Controllers\ViewController::class, 'terminosLegalesTecnicos'])
->name('terminos-legales-tecnicos')->middleware(['auth']);



// Back-End
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('categories', CategoryController::class)->middleware(['auth']);
Route::resource('proyectos', ProyectController::class)->middleware(['auth']);
Route::resource('constructions', ConstructionController::class)->middleware(['auth']);

Route::get('/proyectos/images/add',[App\Http\Controllers\ProyectImageController::class, 'index'])
-> name('ProjectaddImage')->middleware(['auth']);

Route::post('/proyectos/images/store',[App\Http\Controllers\ProyectImageController::class, 'store'])
-> name('ProjectaddImageStore')->middleware(['auth']);

Route::get('/proyectos/{id}/edit/images', [App\Http\Controllers\ProyectImageController::class, 'edit'])
-> name('ProjectImageEdit')->middleware(['auth']);

Route::post('/proyectos/delete/images', [App\Http\Controllers\ProyectImageController::class, 'delete'])
-> name('ProjectImageDelete')->middleware(['auth']);

Route::get('/constructions/images/add', [App\Http\Controllers\ConstructionImageController::class, 'index'])
->name('constructionsAddImage')->middleware(['auth']);

Route::post('/constructions/images/store',[App\Http\Controllers\ConstructionImageController::class, 'store'])
->name('constructionsaddImageStore')->middleware(['auth']);

Route::get('/constructions/{id}/edit/images',[App\Http\Controllers\ConstructionImageController::class, 'edit'])
->name('constructionsaddImageEdit')->middleware(['auth']);

Route::post('/constructions/delete/images', [App\Http\Controllers\ConstructionImageController::class , 'delete'])
->name('ConstructionsImageDelete')->middleware(['auth']);



require __DIR__.'/auth.php';
