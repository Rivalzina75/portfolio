<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Routes Web - Portfolio BTS SIO SLAM
|--------------------------------------------------------------------------
*/

// Page d'accueil
Route::get('/', [HomeController::class, 'index'])->name('portfolio.home');

// Formulaire de contact
Route::post('/contact', [HomeController::class, 'sendContact'])->name('portfolio.contact.submit');

// Téléchargements de documents
Route::get('/files/cv', function () {
    return response()->download(public_path('files/CV-Mekaoui-Reda.pdf'), 'CV_Mekaoui_Reda.pdf');
})->name('portfolio.cv');

Route::get('/files/tableau-synthese', function () {
    return response()->download(public_path('files/TableauSyntheseBtsSioMekaouiReda.pdf'), 'Tableau_Synthese_BTS_SIO_Mekaoui_Reda.pdf');
})->name('portfolio.tableau_synthese');
