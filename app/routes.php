<?php

Route::get('/', function()
{
    return View::make('index');
});

Route::get('/comparison/product', 'ApiController@productComparison');
