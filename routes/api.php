<?php

use App\Http\Resources\DogResource;
use App\Models\Dog;
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

Route::post('dogs', 'DogController@store');
Route::get('dogs', 'DogController@index');
Route::resource('dogs', DogController::class);

Route::get('/dogs/{id}', function (Dog $dog) {
    return new DogResource($dog);
});

Route::get('/dogs', function(){
    $dogs = Dog::all();
    return response()->json($dogs,200); 
});
