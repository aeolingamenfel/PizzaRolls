<?php

Route::get('/', function()
{
    return View::make('index');
});

Route::any('/comparison', array('as' => 'comparison', 'uses' => 'ApiController@comparison'));

Route::any('/comparison/bitcoin', array('as' => 'comparison.bitcoin', 'uses' => 'ApiController@bitcoinComparison'));

Route::any('/comparison/product', array('as' => 'comparison.product', 'uses' => 'ApiController@productComparison'));

Route::any('/comparison/movie', array('as' => 'comparison.movie', 'uses' => "ApiController@movieSearch"));

Route::any('/comparison/stock', array('as' => 'comparison.stock', 'uses' => "ApiController@stockSearch"));

// ======= RESOURCES ======= //

Route::get('/js/{name}', 'ResourceController@GetJavascript');
