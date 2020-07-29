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

//Rotas Locador
Route::post('createLocator', 'LocatorController@createLocator');
Route::get('showLocator/{id}', 'LocatorController@showLocator');
Route::get('listLocator', 'LocatorController@listLocator');
Route::put('updateLocator/{id}', 'LocatorController@updateLocator');
Route::delete('deleteLocator/{id}', 'LocatorController@deleteLocator');

//Rotas República
Route::put('updateRepublic/{id}', 'RepublicController@updateRepublic');
Route::delete('deleteRepublic/{id}', 'RepublicController@deleteRepublic');
Route::post('createRepublic', 'RepublicController@createRepublic');
Route::get('showRepublic/{id}', 'RepublicController@showRepublic');
Route::get('listRepublic', 'RepublicController@listRepublic');
//Relação de República com Locador - Anunciar
Route::put('addRepublic/{locator_id}/{republic_id}', 'LocatorController@addRepublic');
Route::delete('removeRepublic/{locator_id}/{republic_id}', 'LocatorController@removeRepublic');


//Rotas Locatário
Route::post('createTenant', 'TenantController@createTenant');
Route::get('showTenant/{id}', 'TenantController@showTenant');
Route::get('listTenant', 'TenantController@listTenant');
Route::put('updateTenant/{id}', 'TenantController@updateTenant');
Route::delete('deleteTenant/{id}', 'TenantController@deleteTenant');
//Alugar república
Route::put('rent/{id}/{republic_id}', 'TenantController@rent');
Route::delete('undoRent/{id}/{republic_id}', 'TenantController@undoRent');

//Favoritar República
Route::put('favoritar/{id}/{republic_id}', 'TenantController@favoritar');
Route::delete('desfavoritar/{id}/{republic_id}', 'TenantController@desfavoritar');



//Relação de Locatário com Comentários
Route::put('addComment/{id}/{comment_id}', 'TenantController@addComment');
Route::delete('removeComment/{id}/{comment_id}', 'TenantController@removeComment');


//Rotas Comentário
Route::post('createComment', 'CommentController@createComment');
Route::get('showComment/{id}', 'CommentController@showComment');
Route::get('listComment', 'CommentController@listComment');
Route::put('updateComment/{id}', 'CommentController@updateComment');
Route::delete('deleteComment/{id}', 'CommentController@deleteComment');
