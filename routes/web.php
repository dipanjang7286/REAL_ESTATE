<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\PropertyTypeController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// admin
Route::get('admin/login', [AdminController::class,'adminLogin'])->name('admin.login');

Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class,'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class,'adminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class,'adminProfile'])->name('admin.profile');
    Route::post('/admin/profile/update',[AdminController::class,'updateAdmin'])->name('admin.profile.update');
    Route::get('admin/password/change', [AdminController::class,'chnageAdminPassword'])->name('admin.password.change');
    Route::post('admin/update/password', [AdminController::class,'updateAdminPassword'])->name('admin.update.password');
});

// agent

Route::middleware(['auth','role:agent'])->group(function () {
    Route::get('/agent/dashboard', [AgentController::class,'agentDashboard'])->name('agent.dashboard');
    Route::get('/agent/logout', [AgentController::class,'agentLogout']);
    
});

// Property Conroller
Route::middleware(['auth','role:admin'])->group(function () {
    Route::controller(PropertyTypeController::class)->group(function(){
        Route::get('all/property-type','allPropertyType' )->name('all.propertyType');
        Route::get('add/property-type','addPropertyType' )->name('add.propertyType');
        Route::post('store/property-type','storePropertyType')->name('store.propertyType');
    });
});
