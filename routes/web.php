<?php

use App\Http\Controllers\DemandeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    // Déplacez la route de la liste des demandes à la racine du site


    Route::get('/', [DemandeController::class, 'index'])->name('demande.index');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');


    Route::get('/demande/create', [DemandeController::class, 'create'])->name('demande.create');
    Route::post('/demande/create', [DemandeController::class, 'store'])->name('demande.store');
    Route::get('/demande/{demande}', [DemandeController::class, 'show'])->name('demande.show');

    // Routes pour le profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
