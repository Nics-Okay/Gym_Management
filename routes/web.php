<?php

use App\Http\Controllers\AdminPagesController;
use App\Http\Controllers\AdminPinController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MembersPageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/', [PageController::class, 'index'])->name('index'); // Middleware Fallback

Route::get('/login', [AuthController::class, 'create'])->name('login'); //LOGIN->>AuthController[create]
Route::post('/login', [AuthController::class, 'login']); //ROUTE[login]->>AuthController[login]op
 
Route::get('/admin/pin', [AdminPinController::class, 'show'])->name('admin.pin.show'); //ROUTE[admin.pin.show]->>AdminPinController[show]
Route::post('/admin/pin', [AdminPinController::class, 'verify'])->name('admin.pin.verify'); //ROUTE[admin.pin.verify]->>AdminPinController[verify]

  


Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [AdminPagesController::class, 'main'])->name('main');
    Route::get('/admin/clients', [AdminPagesController::class, 'clientsInformation'])->name('admin.clients');

    Route::get('/admin/guest', [AdminPagesController::class, 'guest'])->name('admin.guest');
    Route::get('/admin/transactions/pending', [AdminPagesController::class, 'pendingTransactions'])->name('admin.pending');
    Route::get('/admin/profile', [AdminPagesController::class, 'profileSettings'])->name('admin.profile');
    Route::get('/admin/membership/rates', [AdminPagesController::class, 'membershipRates'])->name('admin.rates');
    Route::get('/admin/revenue', [AdminPagesController::class, 'revenue'])->name('admin.revenue'); 
    Route::get('/admin/membership/status', [AdminPagesController::class, 'membershipStatus'])->name('admin.status');
    Route::get('/admin/tracker', [AdminPagesController::class, 'membersTracker'])->name('admin.tracker');
    Route::get('/admin/transactions/history', [AdminPagesController::class, 'transactionsHistory'])->name('admin.history');

    Route::get('/admin/membership/rates/create', [AdminPagesController::class, 'createRate'])->name('admin.createRate');
    Route::post('/admin/membership/rates/store', [RatesController::class, 'store'])->name('rates.store');
    Route::get('/admin/membership/rates/show', [AdminPagesController::class, 'membershipRates'])->name('rates.show');
    Route::get('/admin/membership/rates/{rate}/edit', [RatesController::class, 'edit'])->name('rates.edit');
    Route::put('/admin/membership/rates/{rate}/update', [RatesController::class, 'update'])->name('rates.update');
    Route::delete('/admin/membership/rates/{rate}/destroy', [RatesController::class, 'destroy'])->name('rates.destroy');
});

Route::middleware(['customer'])->group(function () {
    Route::get('/home', [MembersPageController::class, 'homepage'])->name('customer.homepage');
    Route::get('/logs', [MembersPageController::class, 'logs'])->name('customer.logs');
    Route::get('/rates', [MembersPageController::class, 'membershipRates'])->name('customer.rates');
    Route::get('/settings/profile', [MembersPageController::class, 'profileSettings'])->name('customer.profile');
    Route::get('/qr', [MembersPageController::class, 'qr'])->name('customer.qr');
    Route::get('/settings', [MembersPageController::class, 'settings'])->name('customer.settings');
});

Route::middleware('auth')->group(function () {
    Route::get('/filter', [AuthController::class, 'showRightDashboard'])->name('filter');
});

Route::get('/dashboard', [AuthController::class, 'showRightDashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';