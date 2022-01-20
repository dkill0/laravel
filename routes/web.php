<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



Route::get('products', function () {

    return view('products.index');
})->name('products.index');

Route::get('products/create', function () {

    return view('products.create');
})->name('products.create');

Route::post('products',function( Request $request){
    $newProduct = new Product;
    $newProduct -> description =$request->input('description');
    $newProduct -> price =$request->input('price');
    $newProduct->save();
    return redirect()->route('products.index')->with('info', 'Producto insertado correctamente');
})->name('products.store');

Route::get('products', function(){
    $products = Product::orderBy('created_at', 'desc')->get();
    return view('products.index', compact('products'));
})->name('products.index');

Route::delete('products/{id}', function($id){
    $product=Product::findOrFail($id);
    $product->delete();
    return redirect()->route('products.index')->with('info', 'Producto eliminado correctamente');
})->name('products.destroy');

Route::get('products/{id}/edit', function($id){
        $product= Product::findOrFail($id);
        return view('products.edit', compact('product'));
})->name('products.edit');
