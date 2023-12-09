<?php

use App\Http\Controllers\ProfileController;
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
    if (auth()->check()) {
        return redirect('/dashboard');
    } else {
        return view('auth.login');
    }
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/credit', [ProfileController::class, 'credit'])->name('credit');
    Route::post('/credit-submit', [ProfileController::class, 'creditSubmit'])->name('credit-submit');
    Route::get('/debit', [ProfileController::class, 'debit'])->name('debit');
    Route::post('/debit-submit', [ProfileController::class, 'debitSubmit'])->name('debit-submit');
    Route::get('/about', [ProfileController::class, 'about'])->name('about');
    Route::post('/save-svg', [ProfileController::class, 'saveSVG'])->name('save-svg');

});
// Route::middleware(['auth', 'verified'])->group(function () {
require __DIR__.'/auth.php';
