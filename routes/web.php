<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransacaoController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// route para o crud de pessoas.
Route::resource("/Pessoas", PessoaController::class)
    ->middleware("auth");

// route para o crud de categorias
Route::resource("/Categorias", CategoriaController::class)
    ->middleware("auth");

// route para o crud de transacoes
Route::resource("/Transacao", TransacaoController::class)
    ->middleware("auth");
    
// Fallback back to welcome page
Route::fallback(FallbackController::class);

require __DIR__.'/auth.php';
