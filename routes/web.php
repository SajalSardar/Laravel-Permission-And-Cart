<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'role:Super-Admin']], function () {
    // role and Permission route
    Route::post('/add-permission', [HomeController::class, 'AddPermission'])->name('add.permission');

    Route::get('/delete/permission/{id}', [HomeController::class, 'DeletePermission'])->name('delete.permission');

    Route::get('/role-permission', [HomeController::class, 'RolePermission'])->name('role.permission');
    Route::post('/role-permission', [HomeController::class, 'AssignPermission'])->name('assign.permission');
    Route::get('/role/permission/{rid}/{pid}', [HomeController::class, 'RevokPermission'])->name('revok.permission');

    Route::get('/superadmin/all/users', [UserController::class, 'index'])->name('all.users');
    Route::get('/superadmin/edit/users/{id}', [UserController::class, 'edit'])->name('edit.users');
    Route::post('/superadmin/update/users', [UserController::class, 'update'])->name('update.users');
    Route::get('/superadmin/add/users', [UserController::class, 'create'])->name('add.users.superadmin');
    Route::post('/superadmin/add/users', [UserController::class, 'insert'])->name('insert.users.superadmin');

});

//product routs
Route::get('/all-products', [ProductController::class, 'index'])->name('all.products');

//test route
Route::get('/test', [HomeController::class, 'test']);
