<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->get('emails', 'BademailController@show');

$app->get('emails/{email}', 'BademailController@procura');

$app->put('emails/{email}', 'BademailController@insere');

$app->delete('emails/{email}', 'BademailController@retira');

//Para manejo dos e-mails

$app->post('bloqueia', 'BloqueiaMailController@bloqueia');
