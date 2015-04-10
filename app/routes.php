<?php

Route::get('/', function()
{
    return View::make('index');
});

Route::get('/comparison/product', 'ApiController@productComparison');

Route::get('/comparison/movie', "ApiController@movieSearch");

Route::get('/comparison/stock', "ApiController@stockSearch");
