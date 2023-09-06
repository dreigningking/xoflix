<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
     
});
Route::get('logout',function(Request $request){
    $request->user()->token()->revoke();
    return response()->json(['message'=> 'Logged Out Successfully'],200);
})->middleware('auth:api');

Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);

Route::group(['middleware'=> 'auth:api'],function(){
    Route::get('tasks',[TaskController::class,'index']);
    
    Route::post('task/delete',[TaskController::class,'destroy']);
});


