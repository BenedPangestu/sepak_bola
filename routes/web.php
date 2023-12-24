<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KlasemenController;
use App\Http\Controllers\KlubBolaController;
use App\Models\Klasemen;
use App\Models\KlubBola;
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
    $klasemen = Klasemen::with('klub')->orderBy('point', 'desc')->get();

    return view('index', compact('klasemen'));
})->name('index');
Route::get('/klub', function () {
    $klub = KlubBola::all();

    return view('klub', compact('klub'));
});

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'register_action'])->name('register.action');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'login_action'])->name('login.action');
Route::get('password', [AuthController::class, 'password'])->name('password');
Route::post('password', [AuthController::class, 'password_action'])->name('password.action');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/klasemen', [KlasemenController::class, 'index'])->name('admin.klasemen');
    Route::get('/klasemen/input', [KlasemenController::class, 'create'])->name('admin.klasemen.input');
    Route::post('/klasemen/store', [KlasemenController::class, 'store'])->name('admin.klasemen.store');


    Route::get('/klub', [KlubBolaController::class, 'index'])->name('admin.klub');
    Route::get('/klub/input', [KlubBolaController::class, 'create'])->name('admin.klub.input');
    Route::post('/klub/store', [KlubBolaController::class, 'store'])->name('admin.klub.store');

});