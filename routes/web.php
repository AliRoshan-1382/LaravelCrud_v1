<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserGroupController;

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
Route::get('/', [UserGroupController::class, 'index']); //صفحه داشبورد

Route::get('group/GroupsTable', [UserGroupController::class, 'GroupsTable']); //جدول گروه ها
Route::get('group/GroupsAddForm', [UserGroupController::class, 'GroupsAddForm']); // فرم ثبت گروه
Route::post('group/GroupsAdd', [UserGroupController::class, 'GroupsAdd']); //  ثبت گروه
Route::delete('group/GroupsDelete/{Gname}', [UserGroupController::class, 'GroupsDelete']); //  پاک کردن گروه 
Route::get('group/GroupsEditForm/{id}', [UserGroupController::class, 'GroupsEditForm']); // فرم ادیت گروه 
Route::post('group/GroupsEdit', [UserGroupController::class, 'GroupsEdit']); //  ادیت کردن گروه 


Route::get('user/Userform', [UserGroupController::class, 'Userform']); // فرم یوزر 
Route::post('user/AddUserform', [UserGroupController::class, 'AddUserform']); //  ثبت فرم یوزر 
Route::get('user/UserDelete/{id}', [UserGroupController::class, 'UserDelete']); // پاک کردن کاربر 
Route::get('user/UserEditForm/{id}', [UserGroupController::class, 'UserEditForm']); // فرم ادیت کاربر
Route::post('user/UserEdit', [UserGroupController::class, 'UserEdit']); // ثبت ادیت کاربر 
