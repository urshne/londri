<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
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

Route::view('/', 'home.index');

Route::get('member', [MemberController::class, 'index'])->name('member');
Route::post('member', [MemberController::class, 'store']);
Route::post('member/store', [MemberController::class, 'update'])->name('member.update');
Route::post('member/destroy', [MemberController::class, 'destroy'])->name('member.destroy');

Route::get('outlet', [OutletController::class, 'index'])->name('outlet');
Route::post('outlet', [OutletController::class, 'store']);
Route::post('outlet/store', [OutletController::class, 'update'])->name('outlet.update');
Route::post('outlet/destroy', [OutletController::class, 'destroy'])->name('outlet.destroy');

Route::get('paket', [PaketController::class, 'index'])->name('paket');
Route::post('paket', [PaketController::class, 'store']);
Route::post('paket/store', [PaketController::class, 'update'])->name('paket.update');
Route::post('paket/destroy', [PaketController::class, 'destroy'])->name('paket.destroy');

Route::middleware(['auth'])->group(function(){
    Route::get('home', [HomeController::class,'index']);
    
});

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class,'authenticate']);

Route::post('logout',[LoginController::class,'logout']);