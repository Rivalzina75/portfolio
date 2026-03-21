<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\VeilleController;
use Illuminate\Support\Facades\Route;

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
Route::view('/projects/scootup', 'Projects.scootup')->name('project.scootup');

// Formulaire de contact
Route::post('/contact', [HomeController::class, 'sendContact'])
    ->middleware('throttle:5,1')
    ->name('portfolio.contact.submit');

// API Veille Technologique
Route::get('/api/veille/articles', [VeilleController::class, 'getArticles'])
    ->middleware('throttle:30,1')
    ->name('api.veille.articles');

// Clear veille cache
Route::post('/api/veille/clear-cache', [VeilleController::class, 'clearCache'])
    ->middleware('throttle:3,1')
    ->name('api.veille.clear-cache');

// Téléchargements de documents
Route::get('/files/cv', function () {
    $path = public_path('files/CV-Mekaoui-Reda.pdf');
    abort_unless(file_exists($path), 404);

    return response()->download($path, 'CV_Mekaoui_Reda.pdf');
})->name('portfolio.cv');

Route::get('/files/tableau-synthese', function () {
    $path = public_path('files/TableauSyntheseBtsSioMekaouiReda.pdf');
    abort_unless(file_exists($path), 404);

    return response()->download($path, 'Tableau_Synthese_BTS_SIO_Mekaoui_Reda.pdf');
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

    abort_unless(file_exists($path), 404);

    return response()->file($path, [
        'Content-Disposition' => 'inline; filename="' . $filename . '"',
    ]);
})->name('portfolio.documentation');

// Route pour changer de langue
Route::get('/language/{locale}', function (string $locale) {
    if (in_array($locale, ['fr', 'en'], true)) {
        session()->put('locale', $locale);
    }

    return redirect()->back();
})->name('language.switch');
