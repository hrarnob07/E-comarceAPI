<?php

use Illuminate\Http\Request;

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

Route::post('register', 'API\UserController@register');
Route::post('login', 'API\UserController@authenticate');

Route::get('open', 'API\DataController@open');
Route::post('addCategory', 'API\DataController@addCategory')->middleware('cors');
Route::get('getcategory', 'API\DataController@getcategory')->middleware('cors');
Route::post('deleteCategory', 'API\DataController@delete')->middleware('cors');
Route::get('/getCategoryById','API\DataController@categoryById')->middleware('cors');


//jwt
Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user', 'API\UserController@getAuthenticatedUser');
    Route::get('closed', 'API\DataController@closed');
});


// Route::group(['prefix' => 'api/v1','middleware' => 'cors'], function() {
//  Route::get('projects', ['uses' => 'ProjectController@list']);
// });