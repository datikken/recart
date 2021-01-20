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
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\BackupController;

/*
 * API
 */

//Likes API
Route::post('like.post',[LikeController::class, 'like_post'])
    ->name('like.post');
Route::post('like.comment',[LikeController::class, 'like_comment'])
    ->name('like.comment');
Route::post('getPostLikesAndDislikes', [PostController::class, 'getPostLikesAndDislikes'])
    ->name('getPostLikesAndDislikes');
//Posts API
Route::get('getAllPosts', [PostController::class, 'getAllPosts'])
    ->name('getAllPosts');
Route::get('getPostById', [PostController::class, 'get'])
    ->name('getPostById');
//Subscriptions API
Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])
    ->name('subscribe');
//Cart API
Route::get('/checkCartState', [CartController::class, 'show'])
    ->name('checkCartState');
Route::post('/cart.add', [CartController::class, 'add'])
    ->name('cart.add');
Route::post('/cart.delete', [CartController::class, 'delete'])
    ->name('cart.delete');
Route::post('/cart.update', [CartController::class, 'update'])
    ->name('cart.update');
//Information API
Route::get('/getInformationPosts', [InformationController::class, 'get_all_posts'])
    ->name('getInformationPosts');
Route::get('/getAllYears', [AboutController::class, 'getAllYears'])
    ->name('getAllYears');
//Users API
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
//Feedback API
Route::post('/sendContactsProposal', [FeedbackController::class, 'sendContactsProposal'])
    ->name('sendContactsProposal');
//Orders API
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
//Products API
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
//Comments API
Route::post('/comment.store', [CommentController::class, 'store'])
    ->name('comment.store');
Route::get('comments', [CommentController::class,'get'])
    ->name('comments');
Route::get('getPostComments', [CommentController::class,'getPostComments'])
    ->name('postComments');
Route::delete('comment.delete', [CommentController::class,'destroy'])
    ->name('comment.delete');
Route::post('/reply.store', [CommentController::class, 'replyStore'])
    ->name('reply.add');
//Checkout API
Route::get('/checkCartState', [CartController::class, 'show'])
    ->name('checkCartState');
//Search API
Route::group(['middleware' => 'ajax'], function () {
    Route::post('/search', [SearchController::class, 'search'])
        ->name('search');
});
// Emails API
// emailverification url: verification.send
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
Route::get('/blog/{id}', [PostController::class, 'detail'])
    ->name('blog.view');
Route::get('/about', [AboutController::class, 'index'])
    ->name('about');
Route::get('/contacts', [ContactsController::class, 'index'])
    ->name('contacts');
Route::get('/tracking', [TrackingController::class, 'index'])
    ->name('tracking');
Route::post('/trackingGet', [TrackingController::class, 'trackingGet'])
    ->name('trackingGet');
Route::get('/cart', [CartController::class, 'index'])
    ->name('cart');
Route::get('/checkout', [CheckoutController::class, 'get'])
    ->name('checkout');
Route::get('/checkoutDelivery', [CheckoutController::class, 'checkoutDelivery'])
    ->name('checkoutDelivery');
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});

/*
 * Tech routes
 * to clear cachedMiddlewares: php artisan responsecache:clear
 */
Route::get('/backup', [BackupController::class, 'back_up_from_last_archive'])
    ->name('backup');
Route::get('/test', [TestController::class, 'index'])->name('test');
//    ->middleware('cacheResponse:30');
Route::get('/all', [TestController::class, 'all'])->name('all');
Route::get('/testSearch', [SearchController::class, 'testSearch'])->name('testSearch');
