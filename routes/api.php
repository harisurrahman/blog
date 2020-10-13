<?php

use App\Http\Controllers\LoginController;
use Illuminate\Auth\Events\Login;
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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->post('/logout', function(Request $request){
    $token = $request->user()->token();
    $token->revoke();
    $response = ['message' => 'You have been successfully logged out!'];
    return response($response, 200);
});
 */


//Route::post('/login', [LoginController::class, 'login'])->middleware('json');
Route::post('/login',[LoginController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    /******Login get token *****/
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    /*********Logout / revoke tolen ***********/
    Route::post('/logout', [LoginController::class, 'logout']);

});
