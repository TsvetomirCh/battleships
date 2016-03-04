<?php

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'GameController@homeAction');

    Route::get('/play', 'GameController@playAction');

    Route::post('/play', 'GameController@shotAction');
});
