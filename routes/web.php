<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\SlidersController;
use App\Http\Controllers\ButtonsController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\OriginsController;
use App\Http\Controllers\DestinationsController;
use App\Http\Controllers\PartnersController;
use App\Http\Controllers\ShippingratesController;
use App\Http\Controllers\VariantservicesController;
use App\Http\Controllers\OutletsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\ArticlesController;
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



Route::group(['prefix' => 'admin','middleware' => ['auth','checkRole:super-admin']],function(){
    Route::resource('dashboard', DashboardsController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('tags', TagsController::class);
    Route::resource('slider', SlidersController::class);
    Route::resource('buttons', ButtonsController::class);
    Route::resource('testimonial', TestimonialsController::class);
    Route::resource('origin', OriginsController::class);
    Route::resource('destination', DestinationsController::class);
    Route::resource('partner', PartnersController::class);
    Route::resource('rate', ShippingratesController::class);
    Route::resource('variant', VariantservicesController::class);
    Route::resource('outlet', OutletsController::class);
    Route::resource('role', RolesController::class);
    Route::resource('contact', ContactusController::class);
    Route::resource('article', ArticlesController::class);
    Route::post('/postimg', [ArticlesController::class,'upload'])->name('article.upload');
    
    Route::get('/user/trash',[UserController::class, 'showTrash'])->name('user.trash');
    Route::get('/user/restore/{id}',[UserController::class, 'restore'])->name('user.restore');
    Route::delete('/user/kill/{id}',[UserController::class, 'kill'])->name('user.kill');
    Route::resource('user', UserController::class);
});


