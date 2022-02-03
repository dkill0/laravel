<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::middleware('auth')->group(function () {

    Route::get('products', 'ProductController@index')->name('products.index');

    Route::get('products/create', 'ProductController@create')->name('products.create');

    Route::post('products', 'ProductController@store')->name('products.store');

    Route::delete('products/{id}', 'ProductController@destroy')->name('products.destroy');

    Route::get('products/{id}/edit', 'ProductController@edit')->name('products.edit');

    Route::put('products/{id}', 'ProductController@update')->name('products.update');

    Route::get('/activity', 'ProductController@updatedActivity');
});

Auth::routes();
