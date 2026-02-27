<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VeilleController;

/*
|--------------------------------------------------------------------------
| Routes Web - Portfolio BTS SIO SLAM
|--------------------------------------------------------------------------
*/

// Page d'accueil
Route::get('/', [HomeController::class, 'index'])->name('portfolio.home');

// Pages projets
Route::view('/projects/portfolio', 'Projects.portfolio')->name('project.portfolio');
Route::view('/projects/assuroweb', 'Projects.assuroweb')->name('project.assuroweb');
Route::view('/projects/next2you', 'Projects.next2you')->name('project.next2you');
Route::view('/projects/machina', 'Projects.machina')->name('project.machina');
Route::view('/projects/parking', 'Projects.parking')->name('project.parking');
Route::view('/projects/personnel', 'Projects.personnel')->name('project.personnel');
Route::view('/projects/stage-2026', 'Projects.stage2026')->name('project.stage2026');

// Formulaire de contact
Route::post('/contact', [HomeController::class, 'sendContact'])->name('portfolio.contact.submit');

// API Veille Technologique
Route::get('/api/veille/articles', [VeilleController::class, 'getArticles'])->name('api.veille.articles');

// Clear veille cache
Route::get('/api/veille/clear-cache', function () {
    \Illuminate\Support\Facades\Cache::forget('veille_articles');
    return response()->json(['status' => 'Cache cleared', 'time' => now()]);
})->name('api.veille.clear-cache');

// Téléchargements de documents
Route::get('/files/cv', function () {
    return response()->download(public_path('files/CV-Mekaoui-Reda.pdf'), 'CV_Mekaoui_Reda.pdf');
})->name('portfolio.cv');

Route::get('/files/tableau-synthese', function () {
    return response()->download(public_path('files/TableauSyntheseBtsSioMekaouiReda.pdf'), 'Tableau_Synthese_BTS_SIO_Mekaoui_Reda.pdf');
})->name('portfolio.tableau_synthese');


// Route for documentation-portfolio.pdf (FR/EN)
Route::get('/documents/documentation-portfolio.pdf', function () {
    $locale = session('locale', config('app.locale'));
    if ($locale === 'en') {
        $path = public_path('files/documentation-portfolioEN.pdf');
        $filename = 'documentation-portfolioEN.pdf';
    } else {
        $path = public_path('files/documentation-portfolio.pdf');
        $filename = 'documentation-portfolio.pdf';
    }
    return response()->file($path, [
        'Content-Disposition' => 'inline; filename="' . $filename . '"'
    ]);
})->name('portfolio.documentation');

// Route pour changer de langue
Route::get('/language/{locale}', function (string $locale) {
    if (in_array($locale, ['fr', 'en'])) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('language.switch');
