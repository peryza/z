<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('users-list', 'userController@usersList');

Route::get('users', 'userController@index');

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
);

Route::resource('cars', 'carController');

Route::resource('cars', 'carController');

Route::resource('cars', 'carController');

Route::resource('cars', 'carController');

Route::resource('cars', 'carController');

Route::resource('cars', 'carController');

Route::resource('cars', 'carController');

Route::resource('cars', 'carController');

Route::resource('cars', 'carController');

Route::resource('cars', 'carController');

Route::resource('cars', 'carController');

Route::resource('cskas', 'cskaController');

Route::resource('cskas', 'cskaController');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('zenits', 'zenitController');

Route::resource('cskas', 'cskaController');

Route::resource('lokos', 'lokoController');

Route::resource('sochis', 'sochiController');

Route::resource('spartaks', 'spartakController');

Route::resource('krasnodars', 'KrasnodarController');

Route::resource('$MODELNAMES', '$MODEL_NAMEController');

Route::resource('rostovs', 'RostovController');

Route::resource('users', 'userController');




Route::resource('asds', 'AsdController');

Route::resource('ahmats', 'ahmatController');

Route::resource('orenburgs', 'orenburgController');

Route::resource('uFAS', 'UFAController');

Route::resource('torpedos', 'torpedoController');



  Route::resource('tombovs', 'TombovController');

  Route::get('tombovs-list', 'TombovController@tombovsList');

  //Route::get('tombovs', 'TombovController@index');



  Route::resource('clients', 'ClientController');

//Route::get('clients', 'ClientController@index');

Route::get('clients-list', 'ClientController@clientsList');

Route::resource('dinamos', 'DinamoController');

Route::resource('rubins', 'RubinController');

Route::resource('dinamo2s', 'Dinamo2Controller');

Route::resource('cska2s', 'Cska2Controller');

Route::get('cska2s-list', 'Cska2Controller@cska2sList');

//Route::get('cska2s', 'Cska2Controller@index');

Route::resource('cats', 'catController');

Route::resource('dogs', 'DogController');

Route::get('dogs-list', 'DogController@dogsList');

///Route::get('dogs', 'DogController@index');

Route::resource('cats', 'CatController');

Route::resource('autos', 'AutoController');
Route::get('autos-list', 'AutoController@autosList');
//Route::get('autos', 'AutoController@index');

Route::resource('models', 'ModelController');


Route::resource('firms', 'FirmController');

Route::group(['prefix' => 'pattern'], function() {
    Route::get('/', [
        'uses' => 'PatternController@initSingleton'
    ]);
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/admin', function(){
    echo "Hello Admin";
})->middleware('admin');

Route::get('/agent', function(){
    echo "Hello Agent";
})->middleware('agent');

Route::get('/customer', function(){
    echo "Hello Customer";
})->middleware('customer');