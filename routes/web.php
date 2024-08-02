<?php

use App\Http\Controllers\activiteController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\categorieController;
use App\Http\Controllers\courbeController;
use App\Http\Controllers\entreController;
use App\Http\Controllers\marchandiseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\rapportController;
use App\Http\Controllers\sortieController;
use App\Http\Controllers\UserController;
use App\Models\activites;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\View;

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
    return redirect('/home');
});

Route::get('/home', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



Route::post('/api/create-sortie', [sortieController::class, 'storescan']);
Route::post('/api/create-entree', [entreController::class, 'storescan']);

Route::get('/marchandise-info/{marchandises}', [marchandiseController::class, 'getMarchandiseInfo']);
Route::get('/marchandise-bare/{marchandises}', [marchandiseController::class, 'getMarchandiseBare']);




Route::get('/documents', [CategorieController::class, 'index'])->name('categories.index');
Route::get('/categories', [CategorieController::class, 'index_cat'])->name('categories.index_cat');
Route::get('/categories/create', [CategorieController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategorieController::class, 'store'])->name('categories.store');
Route::put('/categories/{categorie}', [CategorieController::class, 'update'])->name('categories.update');
Route::delete('/categories/delete', [CategorieController::class, 'delete'])->name('categories.delete');
Route::get('/categories/{categories}/edit', [CategorieController::class, 'edit'])->name('categories.edit'); 
Route::get('/categories/{categories}/documents', [CategorieController::class, 'entre_sortie'])->name('categories.entre_sortie'); 
Route::get('/categories/{categories}/documents/entres', [CategorieController::class, 'entre'])->name('categories.entre'); 
Route::get('/categories/{categories}/documents/sorties', [CategorieController::class, 'sortie'])->name('categories.sortie'); 
Route::get('/categories_Autre/documents', [CategorieController::class, 'entre_sortie_A'])->name('categories_Autre.entre_sortie'); 
Route::get('/categories_Autre/documents/entres', [CategorieController::class, 'entre_A'])->name('categories_Autre.entre'); 
Route::get('/categories_Autre/documents/sorties', [CategorieController::class, 'sortie_A'])->name('categories_Autre.sortie'); 
Route::get('/categories/{categories}', [CategorieController::class, 'index_mar'])->name('categories.index_mar');
Route::get('/categories/entre/{entre}', [CategorieController::class, 'index_mar_acheter'])->name('categories.index_mar_a');
Route::get('/categories/sortie/{sorties}', [CategorieController::class, 'index_mar_vendre'])->name('categories.index_mar_v');



Route::get('/marchandises', [marchandiseController::class, 'index_cat'])->name('marchandises.index_cat');
Route::get('/marchandises/categories/{categories}', [marchandiseController::class, 'index'])->name('marchandises.index');
Route::get('/marchandises/categories/{categories}/search', [marchandiseController::class, 'search'])->name('marchandises.search'); 
Route::get('/marchandises/Autre', [marchandiseController::class, 'Autre'])->name('marchandises.Autre');  
Route::get('/marchandises/Autre/search', [marchandiseController::class, 'search_Autre'])->name('marchandises.search_Autre');  
Route::get('/marchandises/create', [marchandiseController::class, 'create'])->name('marchandises.create');
Route::get('/entres/create_bar', [marchandiseController::class, 'create_bar'])->name('marchandises.create_bar');
Route::get('/marchandises/create/{categories}', [marchandiseController::class, 'create_cat'])->name('marchandises.create.cat');
Route::post('/marchandises', [marchandiseController::class, 'store'])->name('marchandises.store');
Route::put('/marchandises/{marchandise}', [marchandiseController::class, 'update'])->name('marchandises.update');
Route::delete('/marchandises/delete', [marchandiseController::class, 'delete'])->name('marchandises.delete');
Route::get('/marchandises/{marchandises}/edit', [marchandiseController::class, 'edit'])->name('marchandises.edit');


Route::get('/entres/create', [marchandiseController::class, 'create'])->name('entres.create');
Route::post('/entres', [entreController::class, 'store'])->name('entres.store');
Route::put('/entres/{entre}', [entreController::class, 'update'])->name('entres.update');
Route::delete('/entres/{entre}', [entreController::class, 'delete'])->name('entres.delete');
Route::get('/entres/{entres}/edit', [entreController::class, 'edit'])->name('entres.edit');
Route::get('/entres/{entres}/{categories}/mar', [entreController::class, 'acheter'])->name('entres.mar');
Route::get('/sorties/{sorties}/{categories}/mar', [sortieController::class, 'vendre'])->name('sorties.mar');

Route::get('/sorties', [sortieController::class, 'index'])->name('sorties.index');
Route::get('/sorties/create', [sortieController::class, 'create'])->name('sorties.create');
Route::post('/sorties', [sortieController::class, 'store'])->name('sorties.store');
Route::put('/sorties/{sortie}', [sortieController::class, 'update'])->name('sorties.update');
Route::delete('/sorties/{sortie}', [sortieController::class, 'delete'])->name('sorties.delete');
Route::get('/sorties/{sorties}/edit', [sortieController::class, 'edit'])->name('sorties.edit');
Route::post('/rapports/export', [rapportController::class, 'downloadExcel'])->name('rapports.excel');


Route::get('/rapports', [RapportController::class, 'index'])->name('rapports.index');
Route::post('/rapports/download-pdf', [RapportController::class, 'downloadPdf'])->name('rapports.pdf');
Route::post('/rapports/download-entre', [RapportController::class, 'downloadentre'])->name('rapports.entre');
Route::post('/rapports/download-sortie', [RapportController::class, 'downloadsortie'])->name('rapports.sortie');
Route::post('/rapports/download-qr', [RapportController::class, 'downloadqr'])->name('rapports.qr');
Route::get('/rapports/search', [rapportController::class, 'search'])->name('rapport.search');
Route::get('/rapports/courbe', [courbeController::class, 'courbe'])->name('rapports.courbe');
Route::get('/rapports/chart', [courbeController::class, 'updateChartDatam'])->name('updateChartDatam');
Route::get('/rapports/chartp', [courbeController::class, 'updateprd'])->name('updateprd');
Route::get('/rapports/char', [courbeController::class, 'updatees'])->name('updatees');

Route::get('register', [UserController::class, 'register'])
->name('register');

Route::post('register', [UserController::class, 'store']);
Route::get('historique', [activiteController::class, 'index'])->name('histo');
Route::get('histor', [activiteController::class, 'index_t'])->name('type');
Route::get('hist/{user}', [activiteController::class, 'index_adm'])->name('adm');
Route::get('his/{user}', [activiteController::class, 'type_adm'])->name('adm_t');

Route::get('/admin/list', [UserController::class, 'list'])->name('admin.list');
Route::get('/admin/update/{user}', [UserController::class, 'modif']);
Route::put('/admin/update/{user}', [UserController::class, 'modif_info'])->name('user.update');
Route::put('/admin/password/{user}', [UserController::class, 'modif_password'])->name('user.password');
Route::delete('/admin/delete', [UserController::class, 'delete']);
Route::get('/scanner', function () {
    return View('scanner.scanner');
});
Route::get('/tst', function () {
    return View('tst');
});
Route::get('/qrscan', function () {
    return View('scanner.html5-qrcode.min.js');
});

});

require __DIR__.'/auth.php';
