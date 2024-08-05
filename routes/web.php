<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommandeController;

// Page de connexion par défaut
Route::get('/', function () {
    return view('Auth.auth-login');
});

// Ressources
Route::resource('dashboard', 'App\Http\Controllers\Dashboard\DashboardController');
Route::resource('auth', 'App\Http\Controllers\Auth\AuthController');
Route::resource('livreurs', 'App\Http\Controllers\Livreurs\LivreurController');
Route::resource('admin', 'App\Http\Controllers\SousAdmin\AdminController');
Route::resource('settings', 'App\Http\Controllers\Settings\SettingController');
Route::resource('partenaires', 'App\Http\Controllers\Partenaires\PartenaireController');
Route::resource('commande', 'App\Http\Controllers\CommandeController');

// Routes d'authentification
Route::controller(AuthController::class)->group(function () {
    Route::get('locale/{langue}', 'setLang')->name('locale');
    Route::get('logout', 'logout')->name('logout');
});

// Routes des paramètres
Route::post('/save_to_orders_for_delevery', [CommandeController::class, 'save_to_orders_for_delevery'])->name('save_to_orders_for_delevery');
Route::get('/livreur_password', [App\Http\Controllers\Settings\SettingController::class, 'livreur_password'])->name('livreur_password');
Route::get('/susprendre_livreur/{id}', [App\Http\Controllers\Livreurs\LivreurController::class, 'suspendre_livreur'])->name('suspendre_livreur');
Route::get('/activer_livreur/{id}', [App\Http\Controllers\Livreurs\LivreurController::class, 'activer_livreur'])->name('activer_livreur');
Route::post('/password', [App\Http\Controllers\Settings\PasswordController::class, 'store'])->name('password_save');
Route::get('/partenaire_associes/{id}', [App\Http\Controllers\SousAdmin\AdminController::class, 'partenaire_associes'])->name('partenaire_associes');
Route::post('/update_theme_app', [App\Http\Controllers\Settings\SettingController::class, 'update_theme_app'])->name('update_theme_app');
Route::get('/go_to_add_order_livreurs', [App\Http\Controllers\Livreurs\LivreurController::class, 'go_to_add_order_livreurs'])->name('go_to_add_order_livreurs');
Route::get('/view_detail_order/{id}', [CommandeController::class, 'view_detail_order'])->name('view_detail_order');
Route::get('/peformance_livreurs', [App\Http\Controllers\Livreurs\LivreurController::class, 'peformance_livreurs'])->name('peformance_livreurs');
