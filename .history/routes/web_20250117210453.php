<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileController;


Route::get('/', [MainController::class, 'showLandingPage']);

Route::get('/login', [AuthController::class, 'showLoginPage'])->name('login.page');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'showRegisterPage'])->name('register.page');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    // Dashboard Page
    Route::get('/dashboard', [DashboardController::class, 'showMainPage'])->name('dashboard');

    // Manage Skill Page
    Route::get('/manage-skill', [SkillController::class, 'showManageSkillPage'])->name('manage-skill');
    Route::post('/add-skill', [SkillController::class, 'storeSkill'])->name('add-skill');
    Route::delete('/delete-skill/{id}', [SkillController::class, 'deleteSkill'])->name('delete-skill');

    // Manage Service Page
    Route::get('/manage-service', [ServiceController::class, 'showManageServicePage'])->name('manage-service');
    Route::post('/add-service', [ServiceController::class, 'storeService'])->name('add-service');
    Route::delete('/delete-service/{id}', [ServiceController::class, 'deleteService'])->name('delete-service');

    // Manage Project Page
    Route::get('/manage-project', [ProjectController::class, 'showManageProjectPage'])->name('manage-project');
    Route::post('/manage-project/store', [ProjectController::class, 'storeProject'])->name('store-project');
    Route::delete('/delete-project/{id}', [ProjectController::class, 'deleteProject'])->name('delete-project');


    // Profile Pages
    Route::get('/profile/{id?}', [ProfileController::class, 'showProfilePage'])->name('profile.page');
    Route::put('/profile/{id}', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/delete/{id}', [ProfileController::class, 'destroy'])->name('profile.delete');

    // Manage User Page
    Route::get('/manage-user', [ProfileController::class, 'showManageUserPage'])->name('manage-user');
});
