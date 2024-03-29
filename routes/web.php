<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['namespace' => 'Courses'], function () {
    Route::get('/', 'IndexController')->name('courses.index');
    Route::get('/{courses}/show', 'ShowController')->name('courses.show');
    Route::get('/create', 'CreateController')->name('courses.create');
    Route::post('/store', 'StoreController')->name('courses.store');
    Route::delete('/delete/{courses}', 'DeleteController')->name('courses.delete');
    Route::post('/update/{courses}', 'UpdateController')->name('courses.update');
    Route::get('/edit/{courses}', 'EditController')->name('courses.edit');
    Route::delete('/deletefile/{id}', 'DeleteFileController')->name('delete.file');
});


Auth::routes();

