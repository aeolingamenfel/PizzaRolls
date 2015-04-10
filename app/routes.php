<?php

Route::get('/', function()
{
    return View::make('index');
});

Route::any('/comparison', 'ApiController@comparison');

Route::any('/comparison/bitcoin', 'ApiController@bitcoinComparison');

Route::any('/comparison/product', 'ApiController@productComparison');

Route::any('/comparison/movie', "ApiController@movieSearch");

Route::any('/comparison/stock', "ApiController@stockSearch");
