<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index () {
        $products = DB::table('products')->where('price','>','3')->get();
        return view('products.index', compact('products'));
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request) {
        $newProduct = new Product;
        $newProduct->description = $request->input('description');
        $newProduct->price = $request->input('price');
        $newProduct->save();
        return redirect()->route('products.index')->with('info', 'Producto insertado correctamente');
    }

    public  function destroy($id) {
        $product = Product::findOrFail($id);
        $text = "'<b>Se ha eliminado el producto: </b>: \n"
        . "<b>ID: </b> \n"
        . "$product->id\n"
        . "<b>Descripcion: </b> \n"
        . "$product->description\n"
        . "<b>Precio: </b> \n"
        . "$product->price"."€";

        \Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_CHANNEL_ID', 'Variable no configurada'),
            'parse_mode' => 'HTML',
            'text' => $text
        ]);
        $product->delete();
        return redirect()->route('products.index')->with('info', 'Producto eliminado correctamente');

    }

    public  function edit($id) {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->save();
        return redirect()->route('products.index')->with('info' . 'Producto modificado correctamente');
    }
    


}
