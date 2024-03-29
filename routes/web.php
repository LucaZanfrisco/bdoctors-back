<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SponsorshipController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('admin/create', function(){
//     return view('admin.create');
// })->middleware(['auth', 'verified'])->name('create');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'verified'])->name('admin.')->group(function(){
    Route::resource('doctor', DoctorController::class);
    Route::resource('message', MessageController::class);
    Route::get('lead', [LeadController::class, 'store'])->name('lead');
    Route::resource('sponsorship',SponsorshipController::class);
});


require __DIR__.'/auth.php';
