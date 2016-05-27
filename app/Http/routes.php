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

use Auth;

Route::get('/', 'PostsController@index');

/*
Route::get('/auth', function (){

    //$user = \App\User::find(1);
    //Auth::login($user);

    if(Auth::attempt(['email'=>'ricardoburgmachado@gmail.com', 'password'=>12345])){
        return 'Oi';
    }

    return 'falhou';

    //if(Auth::check()){
    //    return "Logado";
    //}
});


Route::get('/auth/logout', function (){
   Auth::logout();
});
*/

/*
Route::get('auth/login', 'Auth\AuthController@getLogin');

Route::post('auth/login', 'Auth\AuthController@postLogin');

Route::get('auth/logout', 'Auth\AuthController@getLogout');
*/

//isso aqui simplifica o mapemaneto das rotas que estavam implementadas acima
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);


//A middleware auth já vem por padrão configurada no Laravel, em Kernel.php ela está configurada

//A partir da versão 5.2 com a inserção dos grupos agregados de middlewares, por padrão precisamos usar o grupo de middleware 'web' nas rotas. Este grupo ativa as sessions, csrf e outras coisas.
//Sem isso por exemplo o login não funciona.

//Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function (){//feito no curso por usar laravel 5.1
Route::group(['prefix'=>'admin', 'middleware'=>'web'], function (){
    Route::group(['prefix'=>'posts'], function (){

        Route::get('', ['as'=>'admin.posts.index', 'uses'=>'PostAdminController@index']);

        Route::get('create', ['as'=>'admin.posts.create', 'uses'=>'PostAdminController@create']);

        Route::Post('store', ['as'=>'admin.posts.store', 'uses'=>'PostAdminController@store']);

        Route::Get('edit/{id}', ['as'=>'admin.posts.edit', 'uses'=>'PostAdminController@edit']);

        Route::Put('update/{id}', ['as'=>'admin.posts.update', 'uses'=>'PostAdminController@update']);

        Route::Get('destroy/{id}', ['as'=>'admin.posts.destroy', 'uses'=>'PostAdminController@destroy']);
    });

});





Route::get('ola/{nome}', 'TestController@index');

Route::get('notas', 'TestController@notas');

Route::get('blog', 'PostsController@index');




