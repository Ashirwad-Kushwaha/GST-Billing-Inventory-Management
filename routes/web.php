<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\SalesController;


Route::get('/', function () {
    return view('welcome');
});


// Application Routes
Route::get('/applications/create', [ApplicationController::class, 'create'])->name('applications.create');
Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');

// Bill Routes
Route::get('/applications/{application}/bills/create', [BillController::class, 'create'])->name('bills.create');
Route::post('/applications/{application}/bills', [BillController::class, 'store'])->name('bills.store');
Route::get('/applications/{application}/bills/{bill}', [BillController::class, 'show'])->name('bills.show');

// Bill Routes
Route::get('/bills', [BillController::class, 'index'])->name('bills.index');  // Lists all bills
Route::get('/bills/create', [BillController::class, 'showApplications'])->name('bills.create');
Route::get('/sales', [SalesController::class, 'showSales'])->name('sales');

Route::resource('inventory', InventoryController::class);


