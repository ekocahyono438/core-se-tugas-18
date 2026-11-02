<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
     public function products(){
        $products = [
            [
                "name_products" => "lenovo",
                "price"=> "Rp5000.000",
            ],  
             [
                "name_products" => "Assus",
                "price"=> "Rp6000.000",
               
            ],

            [
                "name_products" => "tosiba",
                "price"=> "Rp2000.000",
                
            ],
            
        ];
        return view("customers.products", ["products"=>$products]);
    }
}


