<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\MatieresController;
use App\Http\Controllers\AttestationController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\LoginController;
use App\Models\Programme;


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

Route::get('/', function () {
    return view('layouts.index');
});




Route::get('/login', function () {
    return view('login');
});


//login routes

 
// Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware(["alreadyLoggedIn"]);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('alreadyLoggedIn');
Route::post('/loginUtilisateur', [LoginController::class, 'loginUtilisateur'])->name('loginUtilisateur');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard')->middleware(["IsLoggedIn", 'IsAdmin']);
// route::get("/home",[LoginController::class, 'home'])->name('home')->middleware('IsLoggedIn');


Route::middleware(['IsLoggedIn'])->group(function () {

    Route::get('/home', function () {
        return view('layouts.statistique');
    })->name('home');
    // Routes for stagiaires
    Route::get('/stagiaires',[StagiaireController::class, "index"])->name('stagiaires.index');
    Route::get('/stagiaires/show/{id}',[StagiaireController::class, "show"])->name('stagiaires.show');
    Route::get('/stagiaires/create',[StagiaireController::class, "create"])->name('stagiaires.create');
    Route::post('/stagiaires/store', [StagiaireController::class, 'store'])->name('stagiaires.store');
    Route::get('/stagiaires/edit/{id}',[StagiaireController::class, "edit"])->name('stagiaires.edit');
    Route::post('/stagiaires/update/{id}',[StagiaireController::class, "update"])->name('stagiaires.update');
    Route::delete('/stagiaires/delete/{id}',[StagiaireController::class, "delete"])->name('stagiaires.delete');



    Route::get('/stagiaires/impression/{id}',[AttestationController::class, "impression"])->name('stagiaires.impression');
    Route::get('/stagiaires/impression/DemandeDeStage/{id}',[AttestationController::class, "imprimerLaDemandeDeStage"])->name('stagiaires.impDemDeSta');
    Route::get('/stagiaires/impression/AttIns/{id}',[AttestationController::class, "imprimerLaAttestationInscription"])->name('stagiaires.impAttIns');
    Route::get('/stagiaires/impression/AttDeSco/{id}',[AttestationController::class, "imprimerLaAttestationDeScolarite"])->name('stagiaires.AttDeSco');







    // Routes for filieres
    Route::get('/filieres',[FiliereController::class, "index"])->name('filieres.index');
    // Route::get('/filieres/show/{id}',[FiliereController::class, "show"])->name('filieres.show');
    Route::get('/filieres/create',[FiliereController::class, "create"])->name('filieres.create');
    Route::post('/filieres/store', [FiliereController::class, 'store'])->name('filieres.store');

    Route::get('/filieres/edit/{id}',[FiliereController::class, "edit"])->name('filieres.edit');
    Route::put('/filieres/update/{id}',[FiliereController::class, "update"])->name('filieres.update');
    Route::post('/filieres/delete/{id}',[FiliereController::class, "delete"])->name('filieres.delete');



    // Routes for matiere
    Route::get('/matieres',[MatieresController::class, "index"])->name('matieres.index');
    // Route::get('/matieres/show/{id}',[MatieresController::class, "show"])->name('matieres.show');
    Route::get('/matieres/create',[MatieresController::class, "create"])->name('matieres.create');
    Route::post('/matieres/store', [MatieresController::class, 'store'])->name('matieres.store');

    Route::get('/matieres/edit/{id}',[MatieresController::class, "edit"])->name('matieres.edit');
    Route::post('/matieres/update/{id}',[MatieresController::class, "update"])->name('matieres.update');
    Route::get('/matieres/delete/{id}',[MatieresController::class, "destroy"])->name('matieres.delete');





    // Routes for Programme  
    Route::get('/programmes',[ProgrammeController::class, "index"])->name('programmes.index');
    Route::get('/programmes/create',[ProgrammeController::class, "create"])->name('programmes.create');
    Route::post('/programmes/store',[ProgrammeController::class, "store"])->name('programmes.store');
    Route::get('/programmes/edit/{id}',[ProgrammeController::class, "edit"])->name('programmes.edit');
    Route::get('/programmes/show/{id}',[ProgrammeController::class, "show"])->name('programmes.show');
    Route::post('/programmes/update/{id}',[ProgrammeController::class, "update"])->name('programmes.update');
    Route::get('/programmes/delete/{id}',[ProgrammeController::class, "destroy"])->name('programmes.delete');
    Route::get('/programmes/search/{id_filiere}/{annee_scolaire}/{classe}',[ProgrammeController::class, "search"])->name('programmes.search');

    // Routes for utilisateurs  
    Route::get('/utilisateurs',[UtilisateurController::class, "index"])->name('utilisateurs.index');
    Route::get('/utilisateurs/create',[UtilisateurController::class, "create"])->name('utilisateurs.create');
    Route::post('/utilisateurs/create',[UtilisateurController::class, "store"])->name('utilisateurs.store');
    Route::get('/utilisateurs/edit/{id}',[UtilisateurController::class, "edit"])->name('utilisateurs.edit');
    // Route::get('/utilisateurs/show/{id}',[UtilisateurController::class, "show"])->name('utilisateurs.show');
    Route::post('/utilisateurs/update/{id}',[UtilisateurController::class, "update"])->name('utilisateurs.update');
    Route::get('/utilisateurs/delete/{id}',[UtilisateurController::class, "delete"])->name('utilisateurs.delete');


});
