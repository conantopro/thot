<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TccRatesPaqController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('front.pages.start');
})->name('start');

Route::group(['middleware' => 'auth'], function() {
    // Route::get('/start', [HomeController::class, 'start'])->name('start');
    // Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/companies', [CompanyController::class, 'index'])->name('companies');
    Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create');
    Route::post('/companies/store', [CompanyController::class, 'store'])->name('companies.store');
    Route::get('/companies/{company}', [CompanyController::class, 'show'])->name('companies.show');
    Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
    Route::put('/companies/{company}', [CompanyController::class, 'update'])->name('companies.update');
    Route::delete('/companies/{company}', [CompanyController::class, 'destroy'])->name('companies.destroy');

    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees');
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/employees/store', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/employees/{employee}', [EmployeeController::class, 'show'])->name('employees.show');
    Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');

    // Operaciones: COURIER
    Route::get('/operations/courier', [CourierController::class, 'index'])->name('operations.courier.index');
    Route::get('/operations/courier/create', [CourierController::class, 'create'])->name('operations.courier.create');
    Route::post('/operations/courier/store', [CourierController::class, 'store'])->name('operations.courier.store');
    Route::get('/operations/courier/{dispatch}/show', [CourierController::class, 'show'])->name('operations.courier.show');

    // Alianzas: TCC - Paquetería
    Route::get('/alliances/tcc/rates-paq', [TccRatesPaqController::class, 'index'])->name('tcc-rates-paq.index');
    Route::get('/alliances/tcc/rates-paq/create', [TccRatesPaqController::class, 'create'])->name('tcc-rates-paq.create');
    Route::post('/alliances/tcc/rates-paq/store', [TccRatesPaqController::class, 'store'])->name('tcc-rates-paq.store');
    Route::get('/alliances/tcc/rates-paq/{rate}/edit', [TccRatesPaqController::class, 'edit'])->name('tcc-rates-paq.edit');
    Route::put('/alliances/tcc/rates-paq/{rate}', [TccRatesPaqController::class, 'update'])->name('tcc-rates-paq.update');
    Route::delete('/alliances/tcc/rates-paq/{rate}', [TccRatesPaqController::class, 'destroy'])->name('tcc-rates-paq.destroy');

    Route::get('/alliances/tcc/rates-paq/municipios/{id}', [TccRatesPaqController::class, 'getTowns'])->name('tcc-rates-paq.towns');

    Route::get('/reports', [ReportsController::class, 'index'])->name('reports.index');
    // Route::resource('permissions', PermissionController::class);
    // Route::resource('roles', RoleController::class);
});

Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
