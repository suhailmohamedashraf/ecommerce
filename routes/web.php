<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\frontend\IndexController;
use App\Models\User;
use App\Http\Controllers\backend\AdminProfileController;


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

Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm'])->name('admin.login.page');
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('admin/logout',[AdminController::class,'destroy'])->name('admin.logout');

Route::get('admin/profile',[AdminProfileController::class,'admin_profile'])->name('admin.profile');
Route::get('admin/profile/edit',[AdminProfileController::class,'admin_profile_edit'])->name('admin.profile.edit');
Route::post('admin/profile/store',[AdminProfileController::class,'adminProfileStore'])->name('admin.profile.store');
Route::get('admin/profile/changepwd',[AdminProfileController::class,'adminChangePassword'])->name('admin.change.password');
Route::post('admin/profile/updatepwd',[AdminProfileController::class,'adminPasswordUpdate'])->name('admin.password.update');

Route::get('/',[IndexController::class,'index']);

//userprofiles

Route::get('user/logout',[IndexController::class,'userLogout'])->name('user.logout');
Route::get('user/profile',[IndexController::class,'userProfile'])->name('user.profile');
Route::post('user/profile/update',[IndexController::class,'userProfileStore'])->name('update.user.profile');
Route::get('user/changepassword',[IndexController::class,'userChangePassword'])->name('user.change.password');
Route::post('user/password/store',[IndexController::class,'userPasswordStore'])->name('user.password.store');

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id=Auth::user()->id;
    $user_data=User::find($id);
    return view('dashboard',compact('user_data'));
})->name('dashboard');
