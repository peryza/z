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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('cars', 'carAPIController');

Route::resource('cars', 'carAPIController');

Route::resource('cars', 'carAPIController');

Route::resource('cars', 'carAPIController');

Route::resource('cars', 'carAPIController');

Route::resource('cars', 'carAPIController');

Route::resource('cars', 'carAPIController');

Route::resource('cars', 'carAPIController');

Route::resource('cars', 'carAPIController');

Route::resource('cars', 'carAPIController');

Route::resource('cars', 'carAPIController');

Route::resource('cskas', 'cskaAPIController');

Route::resource('cskas', 'cskaAPIController');

Route::resource('zenits', 'zenitAPIController');

Route::resource('cskas', 'cskaAPIController');

Route::resource('lokos', 'lokoAPIController');

Route::resource('sochis', 'sochiAPIController');

Route::resource('users', 'userAPIController');

Route::resource('asds', 'AsdAPIController');

Route::resource('ahmats', 'ahmatAPIController');

Route::resource('orenburgs', 'orenburgAPIController');

Route::resource('u_f_a_s', 'UFAAPIController');

Route::resource('torpedos', 'torpedoAPIController');

Route::resource('tombovs', 'TombovAPIController');

Route::resource('clients', 'ClientAPIController');

Route::resource('dinamos', 'DinamoAPIController');

Route::resource('rubins', 'RubinAPIController');

Route::resource('dinamo2s', 'Dinamo2APIController');

Route::resource('cska2s', 'Cska2APIController');

Route::resource('cats', 'catAPIController');

Route::resource('dogs', 'DogAPIController');

Route::resource('cats', 'CatAPIController');

Route::resource('autos', 'AutoAPIController');

Route::resource('models', 'ModelAPIController');

Route::resource('firms', 'FirmAPIController');