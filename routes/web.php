<?php 

use System\Library\Route;

Route::get('', 'HomeController@index');
Route::get('admin/login', 'Admin\LoginController@index');
Route::get('admin/login/post', 'Admin\LoginController@logincheck');
Route::get('admin/dashboard', 'Admin\DashboardController@index');
Route::get('about', 'PageController@about');
Route::get('admin/candidate', 'Admin\CandidateController@index');
Route::get('admin/candidate/add', 'Admin\CandidateController@add');
// Route::get('admin/candidate/edit', 'Admin\CandidateController@index');
Route::get('admin/candidate/edit/{id}', 'Admin\CandidateController@edit');
Route::get('admin/candidate/delete/{id}', 'Admin\CandidateController@delete');
