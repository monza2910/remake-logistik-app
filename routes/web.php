<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
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
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\TransactionTravelController;
use App\Http\Controllers\ArmadaController;
use App\Http\Controllers\ArmadaTrController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Livewire\Logistic;
use App\Http\Livewire\Logisticton;
use App\Http\Livewire\Travel;
use App\Http\Livewire\Armada;
use App\Http\Livewire\Armadabus;
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
Auth::routes(['register'=> false]);

Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
    Route::get('/logout', [LoginController::class,'keluar']);
 });

Route::get('/',[BlogController::class, 'index'])->name('blog.index');
Route::get('/#tab',[BlogController::class, 'index'])->name('blog.cek');
Route::get('/article',[BlogController::class, 'showArticle'])->name('blog.showarticle');
Route::get('/article/{article:slug}',[BlogController::class, 'openArticle'])->name('blog.openarticle');
Route::get('/article/category/{category}',[BlogController::class, 'showArticleByCategory'])->name('blog.category');
Route::get('/contact-us',[BlogController::class, 'contactus'])->name('blog.contactus');
Route::post('/contact-us/post',[BlogController::class, 'storecontactus'])->name('blog.storecontactus');
Route::post('/estimasi/track',[BlogController::class, 'estimasiTrack'])->name('estimasi.cek');
Route::get('/tracking/cek',[BlogController::class, 'trackingCek'])->name('tracking.cek');
Route::get('/gallery',[BlogController::class, 'galleryIndex'])->name('blog.gallery');
Route::get('/service-list',[BlogController::class, 'showService'])->name('blog.service');
Route::get('/service-travel/{slug}',[BlogController::class, 'openTravel'])->name('blog.opentravel');
Route::get('/service-armada/{slug}',[BlogController::class, 'openArmada'])->name('blog.armada');


Route::group(['prefix' => 'admin','middleware' => ['auth','checkRole:super-admin,admin,petugas,writer']],function(){

    Route::resource('dashboard', DashboardsController::class);
    Route::get('/profile/setting', [UserController::class,'profileSetting'])->name('profile.setting');
    Route::put('/profile/setting/{id}', [UserController::class,'updateProfileSetting'])->name('profile.update');
});

Route::group(['prefix' => 'admin','middleware' => ['auth','checkRole:super-admin,admin,petugas']],function(){
    Route::get('/tracking/{id}/edit',[TransactionController::class,'addTracking'])->name('tracking.add');
    Route::get('/transaction/logistic/cart', Logistic::class )->name('logisticcart');
    Route::get('/transaction/logisticton/cart', Logisticton::class )->name('logistictoncart');
    Route::post('/tracking/',[TransactionController::class,'storeTracking'])->name('tracking.store');
    Route::delete('/tracking/kill/{id}',[TransactionController::class, 'killTracking'])->name('tracking.kill');
    
    
    Route::get('/transaction/logisticcetak/{id}',[TransactionController::class, 'printPDFLogistic'])->name('printlogistic');
    Route::get('/transaction/trash',[TransactionController::class, 'showTrash'])->name('transaction.trash');
    Route::get('/transaction/restore/{id}',[TransactionController::class, 'restore'])->name('transaction.restore');
    Route::delete('/transaction/kill/{id}',[TransactionController::class, 'kill'])->name('transaction.kill');
    Route::resource('transaction', TransactionController::class);

    Route::get('/transactiontravel/cetak/{id}',[TransactionTravelController::class, 'printPDFTravel'])->name('printtravel');
    Route::get('/transactiontravel/trash',[TransactionTravelController::class, 'showTrash'])->name('transactiontravel.trash');
    Route::delete('/transactiontravel/kill/{id}',[TransactionTravelController::class, 'kill'])->name('transactiontravel.kill');
    Route::get('/transactiontravel/restore/{id}',[TransactionTravelController::class, 'restore'])->name('transactiontravel.restore');
    Route::get('/transactiontravel/cart', Travel::class )->name('travelcart');
    Route::resource('transactiontravel', TransactionTravelController::class);
    
    Route::get('/transactionarmada/cetakTruck/{id}',[ArmadaTrController::class, 'printarmadaTruck'])->name('printarmada');
    Route::get('/transactionarmadabus/cart', Armadabus::class )->name('armadabuscart');
    Route::get('/transactionarmada/trash',[ArmadaTrController::class, 'showTrash'])->name('transactionarmada.trash');
    Route::delete('/transactionarmada/kill/{id}',[ArmadaTrController::class, 'kill'])->name('transactionarmada.kill');
    Route::get('/transactionarmada/restore/{id}',[ArmadaTrController::class, 'restore'])->name('transactionarmada.restore');
    Route::get('/transactionarmada/cart', Armada::class )->name('armadacart');
    Route::resource('transactionarmada', ArmadaTrController::class);
    
    
    Route::get('/transactionarmadabus/cart', Armadabus::class )->name('armadabuscart');




});

Route::group(['prefix' => 'admin','middleware' => ['auth','checkRole:super-admin,admin,writer']],function(){
    
    Route::resource('category', CategoryController::class);
    Route::resource('tags', TagsController::class);
    Route::get('/article/trash',[ArticlesController::class, 'showTrash'])->name('article.trash');
    Route::get('/article/restore/{id}',[ArticlesController::class, 'restore'])->name('article.restore');
    Route::delete('/article/kill/{id}',[ArticlesController::class, 'kill'])->name('article.kill');
    Route::resource('article', ArticlesController::class);
    Route::post('/postimg', [ArticlesController::class,'upload'])->name('article.upload');
    
});

Route::group(['prefix' => 'admin','middleware' => ['auth','checkRole:super-admin,admin']],function(){

    Route::resource('generalsetting', GeneralSettingController::class);
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
    Route::resource('contact', ContactusController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('facility', FacilityController::class);

    Route::get('/travel/trash',[TravelController::class, 'showTrash'])->name('travel.trash');
    Route::get('/travel/restore/{id}',[TravelController::class, 'restore'])->name('travel.restore');
    Route::delete('/travel/kill/{id}',[TravelController::class, 'kill'])->name('travel.kill');
    Route::post('/travelimg', [TravelController::class,'upload'])->name('travel.upload');
    Route::resource('travel', TravelController::class);
    
    Route::get('/armada/restore/{id}',[ArmadaController::class, 'restore'])->name('armada.restore');
    Route::get('/armada/trash',[ArmadaController::class, 'showTrash'])->name('armada.trash');
    Route::delete('/armada/kill/{id}',[ArmadaController::class, 'kill'])->name('armada.kill');
    Route::post('/armadaimg', [ArmadaController::class,'upload'])->name('armada.upload');
    Route::resource('armada', ArmadaController::class);
    
    Route::get('/user/trash',[UserController::class, 'showTrash'])->name('user.trash');
    Route::get('/user/restore/{id}',[UserController::class, 'restore'])->name('user.restore');
    Route::delete('/user/kill/{id}',[UserController::class, 'kill'])->name('user.kill');
    Route::resource('user', UserController::class);
});

Route::group(['prefix' => 'admin','middleware' => ['auth','checkRole:super-admin']],function(){
    Route::resource('role', RolesController::class);
});


