<?php
use Illuminate\Support\Facades\Route;

$router->group(['prefix' => 'user'], function () use ($router) {
    Route::get('/', 'UserController@index');
    // Route::post('/', 'UserController@submit');
    // Route::get('/', 'UserController@submit');
    // Route::get('/{id}', 'ProductImageController@show');
    // Route::delete('/{id}', ['middleware' => ['auth:api', 'admin'], 'uses' => 'ProductImageController@destroy']);
});

?>