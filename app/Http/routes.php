<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('links/index', 'LinkController@index');

Route::get('about/apropos',[
    'as' => 'about',
    'uses' => 'TaskController@about'
]);

// Routes d'authentification
Route::auth();

// Routes relative au TaskController
Route::get('link/{id}',[
    'as' => 'verstache',
    'uses' => 'TaskController@index'
]);



//Route::get('link/{tasks}', 'TaskController@index');
//Route::post('link/{task}', [
//    'as' => 'addtask',
//    'uses' => 'TaskController@store',
//]);

Route::get('/links/{task}', 'TaskController@index');
Route::post('/link/{task}', 'TaskController@store');

Route::get('/links', 'LinkController@index');
Route::post('/link', 'LinkController@store');
/*
 * La variable {task} de la route égale la variable $task définie dans le Controller
 * L'appelle de cette route se fait via la view avec la méthode DELETE
 */
Route::delete('link/{task}', 'TaskController@destroy');
Route::delete('link/{link}', 'LinkController@destroy');

// Authentication Routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration Routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

});
