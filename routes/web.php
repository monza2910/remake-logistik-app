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
use App\Http\Controllers\BlogController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\TransactionController;
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

// Route::get('/', function () {
//     return view('blog.index');
// });
Auth::routes();
Route::get('/',[BlogController::class, 'index'])->name('blog.index');
Route::get('/article',[BlogController::class, 'showArticle'])->name('blog.showarticle');
Route::get('/contact-us',[BlogController::class, 'contactus'])->name('blog.contactus');
Route::post('/contact-us/post',[BlogController::class, 'storecontactus'])->name('blog.storecontactus');
Route::post('/contact-us/post',[BlogController::class, 'estimasiTrack'])->name('estimasi.cek');
Route::get('/tracking/cek',[BlogController::class, 'trackingCek'])->name('tracking.cek');


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
    Route::resource('team', OurTeamController::class);
    Route::resource('rate', ShippingratesController::class);
    Route::resource('variant', VariantservicesController::class);
    Route::resource('outlet', OutletsController::class);
    Route::resource('role', RolesController::class);
    Route::resource('contact', ContactusController::class);

    Route::get('/tracking/{id}/edit',[TransactionController::class,'addTracking'])->name('tracking.add');
    Route::post('/tracking/',[TransactionController::class,'storeTracking'])->name('tracking.store');
    Route::delete('/tracking/kill/{id}',[TransactionController::class, 'killTracking'])->name('tracking.kill');
    Route::get('/transaction/trash',[TransactionController::class, 'showTrash'])->name('transaction.trash');
    Route::get('/transaction/restore/{id}',[TransactionController::class, 'restore'])->name('transaction.restore');
    Route::delete('/transaction/kill/{id}',[TransactionController::class, 'kill'])->name('transaction.kill');
    Route::resource('transaction', TransactionController::class);

    Route::get('/article/trash',[ArticlesController::class, 'showTrash'])->name('article.trash');
    Route::get('/article/restore/{id}',[ArticlesController::class, 'restore'])->name('article.restore');
    Route::delete('/article/kill/{id}',[ArticlesController::class, 'kill'])->name('article.kill');
    Route::resource('article', ArticlesController::class);
    Route::post('/postimg', [ArticlesController::class,'upload'])->name('article.upload');
    
    Route::get('/user/trash',[UserController::class, 'showTrash'])->name('user.trash');
    Route::get('/user/restore/{id}',[UserController::class, 'restore'])->name('user.restore');
    Route::delete('/user/kill/{id}',[UserController::class, 'kill'])->name('user.kill');
    Route::resource('user', UserController::class);
});


