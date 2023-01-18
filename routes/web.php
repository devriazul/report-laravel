<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
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



Route::get('/',function(){
    return view('frontend.index');
});




Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('/', function () {
        return view('backend.dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');




    Route::resource('reports',ReportController::class);




    /**
     * Laravel Breeze
     * Profile Settings === from Breeze
     * Password
     * User name email
     * Delete Account
     */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
