<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
     public function index(){
         // select *from
        $products = product::all();

        return view ('products.index', ['products'=>$products]);   
    }

    public function create(){
        return view('products.create');
    }

     public function store(Request $request){
      product::create([
        'product_code' => $request->product_code,
        'product_name' => $request->product_name,
        'product_price' => $request->product_price,
        'current_stock' => $request->current_stock,
      ]);
      return redirect()->route('products');
    }

    public function show($id){
        $products= product::findOrfail($id);

      return view('products.show',['products'=> $products]);
    }

    public function edit($id){
      $products = product::findOrfail($id);

      return view('products.edit',['products'=> $products]);
    }

     public function update(Request $request , $id){
      $products= product::findOrfail($id);

      $products->update([
        'product_code' => $request->product_code,
        'product_name' => $request->product_name,
        'product_price' => $request->product_price,
        'current_stock' => $request->current_stock,
      ]);
      return redirect()->route('products');
  }
   public function destroy($id){
    $products= product::findOrfail($id);

    $products->delete();
    return redirect()->route('products')->with('seccess', 'products berhasil dihapus.');
  }

    
}
