<?php

use App\Http\Controllers\Api\GeneralApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ItemApiController;
use App\Http\Controllers\Api\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\Auth\AuthenticationController;


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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::post('/v1/auth/register', [AuthenticationController::class, 'register']);
Route::post('/v1/auth/login', [AuthenticationController::class, 'login']);
Route::get('/v1/auth/account/verify/{token}', [AuthenticationController::class, 'verifyAccount'])->name('user.verify'); 

Route::post('/v1/forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm']); 
Route::post('/v1/reset-password/{token}', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.get');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/v1/auth/logout', [AuthController::class, 'logout']);
});

Route::middleware(['installed', 'demo', 'global_variables', 'maintenance'])->group(function () {
  Route::get('/v1/item/featured/list', [ItemApiController::class, 'getFeaturedItems']);
  Route::get('/v1/item/latest/list', [ItemApiController::class, 'getRecentItems']);
  Route::post('/v1/item/nearby/list', [ItemApiController::class, 'getNearbyItems']);
  Route::get('/v1/item/category/list', [ItemApiController::class, 'getItemCategories']);
  Route::post('/v1/item/subcategory/list', [ItemApiController::class, 'getItemSubcategories']);
  Route::post('/v1/item/by-state/list', [ItemApiController::class, 'getItemsByState']);
  Route::post('/v1/item/by-category/list', [ItemApiController::class, 'getItemsByCategory']);
  Route::post('/v1/item/status', [ItemApiController::class, 'checkItemStatus']);
  Route::post('/v1/item', [ItemApiController::class, 'getItem']);

  Route::get('/v1/canada-states', [GeneralApiController::class, 'getCanadaStates']);

  // pages
  Route::get('/v1/faqs', [GeneralApiController::class, 'getFaqs']);
  Route::get('/v1/privacy-policy', [GeneralApiController::class, 'getPrivacyPolicy']);
  Route::get('/v1/about-us', [GeneralApiController::class, 'getAboutUs']);
  Route::get('/v1/plan', [GeneralApiController::class, 'getPlans']);
  
  Route::get('/v1/blogs', [GeneralApiController::class, 'getBlogs']);
  Route::get('/v1/blog/{id}', [GeneralApiController::class, 'getBlogById']);
  
});
