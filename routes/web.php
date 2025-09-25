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
    Route::get('/clients', [App\Http\Controllers\ClientController::class, 'index'])->name('clients.index');
    Route::get('/clients/create', [App\Http\Controllers\ClientController::class, 'create'])->name('clients.create');
    Route::post('/clients/store', [App\Http\Controllers\ClientController::class, 'store'])->name('clients.store');
    Route::get('/clients/{id}/edit', [App\Http\Controllers\ClientController::class, 'edit'])->name('clients.edit');
    Route::put('/clients/{id}', [App\Http\Controllers\ClientController::class, 'update'])->name('clients.update');
    Route::delete('/clients/{id}', [App\Http\Controllers\ClientController::class, 'destroy'])->name('clients.destroy');
    Route::get('/estimate', [App\Http\Controllers\EstimateController::class, 'index'])->name('estimate.index');
    // Show a specific estimate in the estimator UI
    Route::get('/estimate/{id}', [App\Http\Controllers\EstimateController::class, 'show'])->name('estimate.show');
    // API to get next persistent estimate serial
    Route::get('/estimate/serial/next', [App\Http\Controllers\EstimateSerialController::class, 'next'])->name('estimate.serial.next');
    // Store full estimate (persist estimate and items)
    Route::post('/estimate/store', [App\Http\Controllers\EstimateController::class, 'store'])->name('estimate.store');
    // Create a draft estimate (creates header with BID and primary serial)
    Route::post('/estimate/draft', [App\Http\Controllers\EstimateController::class, 'draft'])->name('estimate.draft');
    // Add a single item to an existing estimate
    Route::post('/estimate/{id}/item', [App\Http\Controllers\EstimateController::class, 'addItem'])->name('estimate.addItem');
    // Return estimate header and items as JSON
    Route::get('/estimate/{id}/items', [App\Http\Controllers\EstimateController::class, 'items'])->name('estimate.items');
    // Update or delete a specific estimate item
    Route::put('/estimate/item/{id}', [App\Http\Controllers\EstimateController::class, 'updateItem'])->name('estimate.updateItem');
    Route::delete('/estimate/item/{id}', [App\Http\Controllers\EstimateController::class, 'deleteItem'])->name('estimate.deleteItem');
    // Upload generated PDF (used by client to upload and share via WhatsApp)
    Route::post('/estimate/upload-pdf', [App\Http\Controllers\EstimateController::class, 'uploadPdf'])->name('estimate.uploadPdf');
    Route::get('/estimate-list', [App\Http\Controllers\EstimateController::class, 'estimateList'])->name('estimate.list');
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
    Route::get('/admin/agents/{id}/edit', [App\Http\Controllers\Admin\AgentController::class, 'edit'])->name('admin.agents.edit');
    Route::put('/admin/agents/{id}', [App\Http\Controllers\Admin\AgentController::class, 'update'])->name('admin.agents.update');
    Route::delete('/admin/agents/{id}', [App\Http\Controllers\Admin\AgentController::class, 'destroy'])->name('admin.agents.destroy');
    Route::get('/admin/clients', [App\Http\Controllers\Admin\ClientController::class, 'index'])->name('admin.clients.index');
    Route::get('/admin/clients/create', [App\Http\Controllers\Admin\ClientController::class, 'create'])->name('admin.clients.create');
    Route::post('/admin/clients/store', [App\Http\Controllers\Admin\ClientController::class, 'store'])->name('admin.clients.store');
    Route::get('/admin/clients/{id}/edit', [App\Http\Controllers\Admin\ClientController::class, 'edit'])->name('admin.clients.edit');
    Route::put('/admin/clients/{id}', [App\Http\Controllers\Admin\ClientController::class, 'update'])->name('admin.clients.update');
    Route::delete('/admin/clients/{id}', [App\Http\Controllers\Admin\ClientController::class, 'destroy'])->name('admin.clients.destroy');
    //Master Settings Routes
    // Property Type Routes
    Route::get('/admin/property-types', [App\Http\Controllers\Admin\PropertyTypeController::class, 'index'])->name('admin.property-types.index');
    Route::get('/admin/property-types/create', [App\Http\Controllers\Admin\PropertyTypeController::class, 'create'])->name('admin.property-types.create');
    Route::post('/admin/property-types/store', [App\Http\Controllers\Admin\PropertyTypeController::class, 'store'])->name('admin.property-types.store');
    Route::get('/admin/property-types/{id}/edit', [App\Http\Controllers\Admin\PropertyTypeController::class, 'edit'])->name('admin.property-types.edit');
    Route::put('/admin/property-types/{id}', [App\Http\Controllers\Admin\PropertyTypeController::class, 'update'])->name('admin.property-types.update');
    Route::delete('/admin/property-types/{id}', [App\Http\Controllers\Admin\PropertyTypeController::class, 'destroy'])->name('admin.property-types.destroy');
});