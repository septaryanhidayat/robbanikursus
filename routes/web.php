<?php

use App\Http\Controllers\Admin\AdvantageController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PricingController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\RegistrationController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

// Public Landing Page Routes
Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::post('/register', [LandingController::class, 'storeRegistration'])->name('register.store');

// Admin Guest Routes
Route::get('/admin/login', [AuthController::class, 'loginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login']);

// Admin Protected Routes
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Registrations Leads Management
    Route::get('/registrations', [RegistrationController::class, 'index'])->name('registrations.index');
    Route::patch('/registrations/{registration}/status', [RegistrationController::class, 'updateStatus'])->name('registrations.updateStatus');
    Route::delete('/registrations/{registration}', [RegistrationController::class, 'destroy'])->name('registrations.destroy');

    // Content Management CRUDs
    Route::resource('pricings', PricingController::class)->except(['create', 'show', 'edit']);
    Route::resource('programs', ProgramController::class)->except(['create', 'show', 'edit']);
    Route::resource('subjects', SubjectController::class)->except(['create', 'show', 'edit']);
    Route::resource('advantages', AdvantageController::class)->except(['create', 'show', 'edit']);
    Route::resource('news', NewsController::class);

    // Site Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
});
