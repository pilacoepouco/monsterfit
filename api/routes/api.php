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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('alimentos', 'AlimentoController@index');
Route::post('insertAlimento', 'AlimentoController@store');

Route::resource('produtos', ProdutoController::class);


Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', [UserAuthController::class, 'login']);
    Route::post('/signup', [UserAuthController::class, 'signup']);



    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('/logout', [UserAuthController::class, 'logout']);
    });
});

Route::resource('users', UsuarioController::class);
Route::resource('dietas', DietaController::class);
// Route::put('produtos/{produto}',"Produto")