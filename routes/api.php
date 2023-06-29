<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [App\Http\Controllers\Api\RegisterController::class, 'register']);
Route::post('login', [App\Http\Controllers\Api\LoginController::class, 'login']);
Route::get('getmaincategory', [App\Http\Controllers\Api\CategoryController::class, 'getMainCategory']);
Route::get('getcategory', [App\Http\Controllers\Api\CategoryController::class, 'getCategory']);
Route::get('getsubcategory', [App\Http\Controllers\Api\CategoryController::class, 'getSubCategory']);
Route::get('getbrands', [App\Http\Controllers\Api\BrandController::class, 'brands']);
Route::post('getproducts', [App\Http\Controllers\Api\ProductController::class, 'products']);
Route::post('getproduct/{product_id}', [App\Http\Controllers\Api\ProductController::class, 'productDetail']);
Route::get('config', [App\Http\Controllers\Api\SettingsController::class, 'configs']);
Route::post('sendOTP', [App\Http\Controllers\Api\LoginController::class, 'sendOTP']);
Route::post('verifyOTP', [App\Http\Controllers\Api\LoginController::class, 'verifyOTP']);
Route::get('getbanner', [App\Http\Controllers\Api\BannerController::class, 'getBanner']);

Route::group(['middleware' => ['auth:api']], function () {
    Route::post('logout', [App\Http\Controllers\Api\LoginController::class, 'logout']);
    Route::post('wishlist', [App\Http\Controllers\Api\WishlistController::class, 'addToWishlist']);
    Route::get('wishlistproducts', [App\Http\Controllers\Api\WishlistController::class, 'wishlistProducts']);
});
