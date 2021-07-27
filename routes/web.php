<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PersonalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;




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

Route::match(['get', 'post'], '/', function () {return view('welcome');})->name('welcome');
Route::get('/social-auth/{provider}', [\App\Http\Controllers\Auth\SocialController::class, 'redirectToProvider'])->name('auth.social');
Route::get('/social-auth/{provider}/callback', [\App\Http\Controllers\Auth\SocialController::class, 'handleProviderCallback'])->name('auth.social.callback');

Route::group([
    'middleware' => ['access']
], function () {
    Auth::routes(['verify' => true]);

    Route::group([
        'middleware' => ['auth', 'verified']
    ], function () {
        Route::match(['get', 'post'], 'profile/edit', [PersonalController::class, 'profile_edit'])->name('profile.edit');
        Route::match(['get', 'post'], 'resource', [PersonalController::class, 'resource'])->name('resource');
        Route::group([
            'middleware' => ['profile']
        ], function () {
            Route::match(['get', 'post'], 'home', [PersonalController::class, 'home'])->name('home');
            Route::match(['get', 'post'], 'profile', [PersonalController::class, 'profile'])->name('profile');
            Route::match(['get', 'post'], 'company/{id}', [PersonalController::class, 'company'])->name('company');
            Route::match(['get', 'post'], 'new-project', [PersonalController::class, 'new_project'])->name('new_project');
            Route::match(['get', 'post'], 'find/{category?}/{subcategory?}', [PersonalController::class, 'find'])->name('find');
            Route::match(['get', 'post'], 'requested', [PersonalController::class, 'requested'])->name('requested');
            Route::match(['get', 'post'], 'requests/{proj?}', [PersonalController::class, 'requests'])->name('requests');
            Route::match(['get', 'post'], 'projects/{proj?}', [PersonalController::class, 'projects'])->name('projects');
            Route::match(['get', 'post'], 'payment', [PersonalController::class, 'payment'])->name('payment');
        });
    });

    Route::match(['get', 'post'], 'admin', [AdminController::class, 'login'])->name('admin.login');
    Route::match(['get', 'post'], 'updated', [AdminController::class, 'updated'])->name('admin.updated');
    Route::group([
        'prefix' => 'admin',
        'middleware' => 'admin',
    ], function () {
        Route::match(['get', 'post'], 'resource', [AdminController::class, 'resource'])->name('admin.resource');
        Route::match(['get', 'post'], '/company/{id?}', [AdminController::class, 'home'])->name('admin.home');
        Route::match(['get', 'post'], 'cruds', [AdminController::class, 'cruds'])->name('admin.cruds');
        Route::match(['get', 'post'], 'settings', [AdminController::class, 'settings'])->name('admin.settings');
        Route::match(['get', 'post'], 'confirm', [AdminController::class, 'confirm'])->name('admin.confirm');
    });
});
