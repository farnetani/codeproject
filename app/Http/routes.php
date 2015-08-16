<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});

//Exigindo autenticação para acessar as rotas abaixo
Route::group(['middleware'=>'oauth'], function() {

	//Simplifica as coisas, pois ele já irá pegar os métodos padrões
	// sem precisar declarar, exceto os create, edit
	Route::resource('client','ClientController',['except'=>['create','edit']]);
	Route::resource('project','ProjectController',['except'=>['create','edit']]);

	//Middleware
//	Route::group(['middleware' => 'CheckProjectOwner'], function() {
//		Route::resource('project', 'ProjectController', ['except'=>['create', 'edit']]);
//	});

	Route::resource('project', 'ProjectController', ['except'=>['create', 'edit']]);

	Route::group(['prefix'=>'project'], function() {

		Route::get('{id}/note', 'ProjectNoteController@index');
		Route::post('{id}/note', 'ProjectNoteController@store');
		Route::get('{id}/note/{noteId}', 'ProjectNoteController@show');
		Route::put('{id}/note/{noteId}', 'ProjectNoteController@update');
		Route::delete('{id}/note/{noteId}', 'ProjectNoteController@delete');

		Route::post('{id}/file','ProjectFileController@store');

	});
});
	//somente a declaração acima já elimina tudo abaixo aqui
//	Route::get('client', ['middleware'=>'oauth', 'uses'=>'ClientController@index']);
//	Route::post('client', 'ClientController@store');
//	Route::get('client/{id}', 'ClientController@show');
//	Route::put('client/{id}', 'ClientController@update');
//	Route::delete('client/{id}', 'ClientController@destroy');

//	Route::get('project/{id}/note', 'ProjectNoteController@index');
//	Route::post('project/{id}/note', 'ProjectNoteController@store');
//	Route::get('project/{id}/note/{noteId}', 'ProjectNoteController@show');
//	Route::put('project/{id}/note/{noteId}', 'ProjectNoteController@update');
//	Route::delete('project/{id}/note/{noteId}', 'ProjectNoteController@delete');

//	Route::get('project', 'ProjectController@index');
//	Route::post('project', 'ProjectController@store');
//	Route::get('project/{id}', 'ProjectController@show');
//	Route::put('project/{id}', 'ProjectController@update');
//	Route::delete('project/{id}', 'ProjectController@destroy');

//Route::get('client', 'ClientController@index');


