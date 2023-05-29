<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\DesignationController;
use App\Http\Controllers\Api\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::group(['prefix' => 'employees'], function () {
        Route::controller(EmployeeController::class)->group(function () {
            Route::get('/', 'index')->name('employees.get');
            Route::post('/', 'store')->name('employees.store');
            Route::put('/{employee}', 'update')->name('employees.update');
            Route::delete('/{employee}', 'delete')->name('employees.delete');
        });
    });

    Route::get('departments', [DepartmentController::class, 'index'])
        ->name('departments.index');

    Route::get('designations', [DesignationController::class, 'index'])
        ->name('designations.index');
});
