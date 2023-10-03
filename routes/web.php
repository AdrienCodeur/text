<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TextController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[AppController::class ,'index']
);


Route::middleware('guest')->group(function (){

    Route::get('login', [AuthController::class  , 'login']
)->name('login');

Route::post('login', [AuthController::class  , 'tologin']
)->name('login');

});
Route::middleware('auth')->group(function(){

    Route::delete('/logout' ,[AuthController::class ,'logout'])->name('logout') ;
});

Route::prefix('departement')->group(function () {

    Route::get('' ,[DepartementController::class ,'index'])->name('departement.index');
    Route::get('/create' ,[DepartementController::class ,'create'])->name('departement.create');
    Route::get('/edit/{departement}' ,[DepartementController::class ,'edit'])->name('departement.edit');
    //routes appelé en post
    Route::post('/create',[DepartementController::class ,'store'])->name('departement.create');
    Route::put('/edit/{departement}',[DepartementController::class ,'updated'])->name('departement.update');
});

Route::prefix('employer')->group(function () {
    Route::get('' ,[EmployerController::class ,'index'])->name('employer.index');
    Route::get('/create' ,[EmployerController::class ,'create'])->name('employer.create');
    Route::get('/edit/{employer}' ,[EmployerController::class ,'edit'])->name('employer.edit');    
    //routes appelé en postd
    Route::post('/create',[EmployerController::class ,'store'])->name('employer.create');
    Route::put('/edit/{employer}',[EmployerController::class ,'updated'])->name('employer.update');
});
Route::get('/text' ,[TextController::class ,'text'])
->middleware('guest')->name('text') ;
Route::post('/text' ,[TextController::class ,'store'])
->middleware('guest')->name('text.store') ;







Route::prefix('configuration')->group(function (){

    Route::get('/',[ConfigurationController::class ,'index'])->name('config.index');
    Route::get('create',[ConfigurationController::class ,'create'])->name('config.create');
    Route::get('edit/{configuration}',[ConfigurationController::class ,'edit'])->name('config.edit');

    //routes appelé en post


    
    Route::post('store',[ConfigurationController::class ,'store'])->name('config.store');
    Route::put('edit/{configuration}',[ConfigurationController::class ,'updated'])->name('config.update');

});


Route::prefix('payment' ,function (){
    Route::get('/',PaymentController::class ,'payment' )->name('payment.list') ;
});

