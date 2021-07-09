<?php

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

//User Login, Registration, Auth, Verification
Auth::routes();

Route::get('/verify/user', [App\Http\Controllers\VerificationController::class, 'index']);
Route::post('/verification', [App\Http\Controllers\VerificationController::class, 'verify'])->name('user.verify');
Route::get('/auth/success', [App\Http\Controllers\Auth\RegisterController::class, 'success'])->name('register.success');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\user\UserController::class, 'profile'])->name('profile');
Route::post('/profile', [App\Http\Controllers\user\UserController::class, 'update'])->name('profile.update');


//Admin Login
Route::get('/login/admin', [App\Http\Controllers\Auth\LoginController::class, 'showAdminLoginForm']);
Route::post('/login/admin', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin']);
Route::get('/admin', [App\Http\Controllers\admin\AdminController::class, 'index'])->name('admin');

//Admin Registration
Route::get('/register/admin', [App\Http\Controllers\Auth\RegisterController::class, 'showAdminRegisterForm']);
Route::post('/register/admin', [App\Http\Controllers\Auth\RegisterController::class, 'createAdmin']);

//Logout
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);


//Routes for Bank
Route::get("/admin/bank", [App\Http\Controllers\admin\BankController::class, 'index'])->name('bank');
Route::get("/admin/bank/create", [App\Http\Controllers\admin\BankController::class, 'create'])->name('bank.create');
Route::post("/admin/bank/create", [App\Http\Controllers\admin\BankController::class, 'store'])->name('bank.store');
Route::get("/admin/bank/edit/{bank}", [App\Http\Controllers\admin\BankController::class, 'edit'])->name('bank.edit');
Route::post("/admin/bank/edit/{bank}", [App\Http\Controllers\admin\BankController::class, 'update'])->name('bank.update');
Route::get("/admin/bank/delete/{bank}", [App\Http\Controllers\admin\BankController::class, 'destroy'])->name('bank.delete');



//Routes for Branch
Route::get("/admin/branch", [App\Http\Controllers\admin\BranchController::class, 'index'])->name('branch');
Route::get("/admin/branch/create", [App\Http\Controllers\admin\BranchController::class, 'create'])->name('branch.create');
Route::post("/admin/branch/create", [App\Http\Controllers\admin\BranchController::class, 'store'])->name('branch.store');
Route::get("/admin/branch/edit/{branch}", [App\Http\Controllers\admin\BranchController::class, 'edit'])->name('branch.edit');
Route::post("/admin/branch/edit/{branch}", [App\Http\Controllers\admin\BranchController::class, 'update'])->name('branch.update');
Route::get("/admin/branch/delete/{branch}", [App\Http\Controllers\admin\BranchController::class, 'destroy'])->name('branch.delete');

//Routes for Document
Route::get("/admin/document", [App\Http\Controllers\admin\DocumentController::class, 'index'])->name('document');
Route::get("/admin/document/create", [App\Http\Controllers\admin\DocumentController::class, 'create'])->name('document.create');
Route::post("/admin/document/create", [App\Http\Controllers\admin\DocumentController::class, 'store'])->name('document.store');
Route::get("/admin/document/edit/{document}", [App\Http\Controllers\admin\DocumentController::class, 'edit'])->name('document.edit');
Route::post("/admin/document/edit/{document}", [App\Http\Controllers\admin\DocumentController::class, 'update'])->name('document.update');
Route::get("/admin/document/delete/{document}", [App\Http\Controllers\admin\DocumentController::class, 'destroy'])->name('document.delete');

