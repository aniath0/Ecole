<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\inscriptions;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HabilitationsController;
use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\SitesController;
use App\Models\Roles;
use App\Models\Statuts;
use App\Models\Habilitations;

use App\Models\User;
use App\Models\Classes;
use App\Models\Matieres;
use App\Models\Classematieres;
use App\Http\Controllers\StatutsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\payements;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ClassematieresController;
use App\Http\Controllers\MatieresController;
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
    return view('auth.connexion');
});


Route::resource('/backend/tables/sites', SitesController::class);

Route::resource('/backend/tables/inscriptions', inscriptions::class);
Route::resource('/backend/tables/etablissements', EtablissementController::class);
Route::resource('/backend/tables/payements', payements::class);
Route::resource('/backend/tables/roles', RolesController::class);
Route::resource('/backend/tables/habilitations', HabilitationsController::class);
Route::resource('/backend/tables/statuts', StatutsController::class);
Route::resource('/backend/tables/users', UsersController::class);
Route::resource('/backend/tables/matieres', MatieresController::class);
Route::resource('/backend/tables/classes', ClassesController::class);
Route::resource('/backend/tables/classematieres', ClassematieresController::class);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');



Route::group([], function () {
    Route::get('/', function () {
        return view('auth/connexion');
    });
      
 
 });

//Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');



Route::view('/parametre', 'backend.parametre')->name('parametre');
Route::view('/changePassword', 'backend.changePassword')->name('changermotdepasse');
Route::resource("users", UsersController::class);
Route::get('change-password', [ChangePasswordController::class, 'index'])->name('change.password');

Route::post('/store', [ChangePasswordController::class, 'store'])->name('changepassword.store');

Route::get('/users', [UsersController::class, 'index'])->name('users.index');
Route::post('/users', [UsersController::class, 'store'])->name('users.store');


