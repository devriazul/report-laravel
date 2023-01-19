<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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



Route::get('/', function (Request $request) {
    $data   = [];
    $search = $request->search ?? null;

    if ($search) {
        $data = Report::where('name', 'like', "%$search%")->orWhere('passport', 'like', "%$search%")->get();
    }

    return view('frontend.index', [
        'reports' => $data
    ]);
})->name('home');

Route::get('report/{id}', function ($id) {
    $report = Report::findOrFail($id);
    return Storage::download($report->path);
})->name('download');




Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('/', function () {
        return view('backend.dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::resource('reports', ReportController::class);

    Route::resource('users', UserController::class);

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
