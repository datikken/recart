<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\HitsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Actions\Fortify\Login;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\DashboardController;
/*
 * Search
 */
Route::group(['middleware' => 'ajax'], function () {
    Route::post('/search', [SearchController::class, 'search'])
        ->name('search');
});

/*
 * API
 */

/*
 * Subscriptions
 */
Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])
    ->name('subscribe');
/*
 * Cart
 */
Route::get('/checkCartState', [CartController::class, 'show'])
    ->name('checkCartState');
Route::post('/cart.add', [CartController::class, 'add'])
    ->name('cart.add');
Route::post('/cart.delete', [CartController::class, 'delete'])
    ->name('cart.delete');
Route::post('/cart.update', [CartController::class, 'update'])
    ->name('cart.update');
/*
 * Information
 */
Route::get('/getInformationPosts', [InformationController::class, 'get_all_posts'])
    ->name('getInformationPosts');
/*
 * About page
 */
Route::get('/getAllYears', [AboutController::class, 'getAllYears'])
    ->name('getAllYears');

/*
 * Users
 */
//Route::post('/createNewUser', [CreateNewUser::class, 'create'])
//    ->name('createNewUser');
Route::post('/login', [Login::class,'__invoke'])
    ->name('login');
Route::get('/exportUsersExcel', [UserController::class, 'exportUsersExcel'])
    ->name('exportUsersExcel');
Route::get('/setProfilePhoto', [UserController::class, 'setProfilePhoto'])
    ->name('setProfilePhoto');
Route::get('/getUserAddress', [UserController::class, 'getUserAddress'])
    ->name('getUserAddress');
Route::post('/setName', [UserController::class, 'setName'])
    ->name('setName');
Route::post('/setLastName', [UserController::class, 'setLastName'])
    ->name('setLastName');
Route::post('/setTel', [UserController::class, 'setTel'])
    ->name('setTel');

/*
 * Feedback
 */
Route::post('/sendContactsProposal', [FeedbackController::class, 'sendContactsProposal'])
    ->name('sendContactsProposal');

/*
 * Orders
 */
Route::get('/order.get', [OrderController::class, 'get'])
    ->name('order.get');
Route::get('/order.create', [OrderController::class, 'create'])
    ->name('order.create');
Route::post('/order.update', [OrderController::class, 'update'])
    ->name('order.update');
Route::post('/order.delete', [OrderController::class, 'delete'])
    ->name('order.delete');
Route::get('/exportOrdersExcel', [OrderController::class, 'exportOrdersExcel'])
    ->name('exportOrdersExcel');

/*
 * Products
 */
Route::get('/getAllProducts', [ProductController::class, 'getAllProducts'])
    ->name('getAllProducts')
    ->middleware('cacheResponse:3600');

Route::get('/getTenProductsWithImages', [ProductController::class, 'getTenProductsWithImages'])
    ->name('getTenProductsWithImages')
    ->middleware('cacheResponse:3600');

Route::post('/getProductById', [ProductController::class, 'getProductById'])
    ->name('getProductById');

Route::get('/exportProductsExcel', [ProductController::class, 'exportProductsExcel'])
    ->name('exportProductsExcel');
/*
 * end API
 */

/*
 * Page routes
 */
Route::get('/', [WelcomeController::class, 'index'])
    ->name('index');
Route::get('/catalog', [CatalogController::class, 'index'])
    ->name('catalog');
Route::get('/catalog/{id}', [CatalogController::class, 'get'])
    ->name('catalog.view');
Route::get('/information', [InformationController::class, 'index'])
    ->name('information');
Route::get('/hits', [HitsController::class, 'index'])
    ->name('hits');
Route::get('/blog', [PostController::class, 'index'])
    ->name('blog');
Route::get('/about', [AboutController::class, 'index'])
    ->name('about');
Route::get('/contacts', [ContactsController::class, 'index'])
    ->name('contacts');
Route::get('/tracking', [TrackingController::class, 'index'])
    ->name('tracking');
Route::post('/trackingGet', [TrackingController::class, 'trackingGet'])
    ->name('trackingGet');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});

Route::get('/cart', [CartController::class, 'index'])
    ->name('cart');

/*
 * Emails
 */

//emailverification url: verification.send

/*
 * Checkout
 */
Route::get('/checkCartState', [CartController::class, 'show'])
    ->name('checkCartState');

Route::get('/checkout', [CheckoutController::class, 'get'])
    ->name('checkout');


/*
 * Test routes
 * to clear cachedMiddlewares: php artisan responsecache:clear
 */
Route::get('/test', [TestController::class, 'index'])->name('test')
    ->middleware('cacheResponse:30');
Route::get('/all', [TestController::class, 'all'])->name('all');
Route::get('/testSearch', [SearchController::class, 'testSearch'])->name('testSearch');
