<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\AdminLoginController;


// User Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// User routes
Route::middleware(['auth', \App\Http\Middleware\PreventBackHistory::class])->group(function () {
    Route::get('/home', [App\Http\Controllers\Controller::class, 'index'])->name('home');
});


// Admin Routes
Route::get('admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminLoginController::class, 'login']);
Route::post('admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth:admin', \App\Http\Middleware\PreventBackHistory::class])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/agents', [App\Http\Controllers\Admin\AgentController::class, 'index'])->name('admin.agents.index');
    Route::get('/admin/agents/create', [App\Http\Controllers\Admin\AgentController::class, 'create'])->name('admin.agents.create');
    Route::post('/admin/agents/store', [App\Http\Controllers\Admin\AgentController::class, 'store'])->name('admin.agent.store');
});