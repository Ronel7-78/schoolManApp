<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Route d'accueil
Route::get('/', function () {
    return view('welcome');
});



// Route pour afficher la page d'accueil admin
Route::get('/Accueil', [AdminController::class, 'index'])->name('home');

// Routes pour les utilisateurs non authentifiés
Route::middleware(['guest'])->group(function () {
    // Route pour afficher le formulaire d'inscription de l'admin (GET)
    Route::get('/inscriptionAdmin', [AdminController::class, 'registerAdmin'])->name('inscriptionAd');
    // Route pour traiter l'inscription de l'admin (POST)
    Route::post('/inscription', [AdminController::class, 'handleRegistration'])->name('inscriptionAdd');
    // Route get pour la page de login
    Route::get('/connexion', [AdminController::class, 'login'])->name('login');
    // Route pour la connexion via le post
    Route::post('/connexion', [AdminController::class, 'handleLogin'])->name('loginAdmin');
});

// Routes pour les utilisateurs authentifiés
Route::middleware(['auth'])->group(function() {

    // Page accueil admin connecté
    Route::get('/AccueilAdmin', [AdminController::class, 'homeAdmin'])->name('AccueilAdminstrateur');

    Route::prefix('/Admin')->group(function() {

        // Fonction de déconnexion
        Route::get('/logOutAdmin', [AdminController::class, 'logoutAdmin'])->name('Admin.logOutA');
        // Afficher les infos relatives à l'admin
        Route::get('/{admin}', [AdminController::class, 'showAdmin'])->name('Admin.shwAc');
        // Route get pour afficher le formulaire de modification de l'admin
        Route::get('/{admin}/editAdmin', [AdminController::class, 'editAdmin'])->name('Admin.modifier');
        // Route put pour modifier le profile de l'admin
        Route::put('/{admin}/UpdateA', [AdminController::class, 'updateAdmin'])->name('Admin.update');
    });

    // groupe de routes consernant les élèves
    Route::prefix('/Students')->group(function(){
        Route::get('/Accueil',[StudentController::class, 'homeStudent' ])->name('Student.home');
        Route::get('/formA',[StudentController::class, 'formAddS'])->name('Student.form');
        Route::post('/createStudent', [StudentController::class, 'addStudent'])->name('Student.Registration');

        //route pour afficher la liste d'élève par classe
        Route::get('/classe/{codeCl}/students', [StudentController::class, 'showStudentsByClass'])->name('Student.showStudentsByClass');

        //route pour afficher les cartes individuelles des élèves
        Route::get('/show/{id}' ,[StudentController::class, 'showStudent'])->name('Student.show');

        //imprimer le reçu de paiement de l'élève
        Route::get('/print/{id}',[StudentController::class ,'printStudent'])->name('Student.printFacture');
    });

    // groupe de routes consernant les classe
    Route::prefix('/Classes')->group(function(){
        // afficher la page d'accueil
        Route::get('/Accueil',[ClassesController::class, 'index' ])->name('Classes.home');

        // afficher le formulaire d'ajout
        Route::get('/formulaire',[ClassesController::class, 'form'])->name('Classes.forms');

        //creer la classe
        Route::post('/create',[ClassesController::class, 'create'])->name('Classes.create');

        //modifier la classe
        Route::get('/{classe}/edit',[ClassesController::class,'editA'])->name('Classes.edit');

        // update classe
        Route::put('/{classe}/update',[ClassesController::class,'update'])->name('Classes.update');

        //pour supprimer la classe de
        Route::delete('/{classe}/delete',[ClassesController::class,'destroy'])->name('Classes.delete');

    });


    //

});




