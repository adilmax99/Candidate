<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('candidate', 'CandidateController');

Route::get('import-export', 'ImportController@importExport');
Route::post('/candidate-import', 'ImportController@candidateImport');
Route::get('export', 'ImportController@export');