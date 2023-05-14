<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\pages\UserRoles;
use App\Http\Controllers\pages\Users;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\pages\ExpenseCatalog;

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

Auth::routes();
// // Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    // roles route
    Route::get('/roles', [UserRoles::class,'viewRoles'])->name('viewRoles');
    Route::post('/roles/add', [UserRoles::class, 'addRoles'])->name('roles.addRoles');
    Route::post('/roles/update-delete-role',[UserRoles::class, 'updateDeleteRole'])->name('roles.updateDeleteRoles');

    //users route
    Route::get('/users', [Users::class,'viewUser'])->name('viewUsers');
    Route::post('/user/add', [Users::class, 'addUsers'])->name('user.addUsers');
    Route::post('/user/update-delete-user',[Users::class, 'updateDeleteUser'])->name('user.updateDeleteUser');

    //expense catalog route
    Route::get('/expense-catalog', [ExpenseCatalog::class,'viewExpenseCatalog'])->name('viewExpenseCatalog');
    Route::post('/expense-catalog/add', [ExpenseCatalog::class, 'addCategory'])->name('expenses.addCategory');
    Route::post('/expense-catalog/update-delete-user',[ExpenseCatalog::class, 'updateDeleteCategory'])->name('expenses.updateDeleteCategory');

    //expenses route
    

});