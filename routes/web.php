<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('front.pages.start');
})->name('start');

Route::group(['middleware' => 'auth'], function() {
    // Route::get('/start', [HomeController::class, 'start'])->name('start');
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

    // Route::resource('permissions', PermissionController::class);
    // Route::resource('roles', RoleController::class);
});

Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
