<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; // 🚀 CHANGEMENT ICI

/*
|--------------------------------------------------------------------------
| Routes Web du Portfolio
|--------------------------------------------------------------------------
*/

// --- 1. ROUTE PRINCIPALE (ACCUEIL) ---
// Gérée par HomeController, charge la vue 'home.blade.php'
Route::get('/', [HomeController::class, 'index'])->name('portfolio.home');


// --- 2. ROUTE DE CONTACT (POST) ---
// Gérée par HomeController pour l'envoi sécurisé
Route::post('/contact', [HomeController::class, 'sendContact'])->name('portfolio.contact.submit');


// --- 3. ROUTES POUR LES PAGES DÉDIÉES (Navigation) ---

// Route pour l'étude de cas de CE portfolio
Route::get('/mon-portfolio', function () {
    return view('Projects.portfolio'); // Pointez vers 'Projects/portfolio.blade.php'
})->name('portfolio.project.portfolio_case_study');

// Route pour le Contexte Pro (À CRÉER)
Route::get('/contexte', function () {
    return view('contexte_pro'); // Pointez vers 'contexte_pro.blade.php'
})->name('portfolio.contexte');

// Route pour la Veille Techno (À CRÉER)
Route::get('/veille', function () {
    return view('veille_techno'); // Pointez vers 'veille_techno.blade.php'
})->name('portfolio.veille');


// --- 4. ROUTE POUR LES DÉTAILS DES AUTRES PROJETS ---
// Gérée par HomeController (ex: /projets/1)
Route::get('/projets/{id}', [HomeController::class, 'showProject'])
    ->where('id', '[0-9]+') 
    ->name('portfolio.project.show');