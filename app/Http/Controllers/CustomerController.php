<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers = [
            [
                "name" => "Nadia putri",
                "email"=> "nadia@gmail.com",
                "city"=> "lampung"
            ],
             [
                "name" => "Bima putri",
                "email"=> "bima@gmail.com",
                "city"=> "tangerang"
            ],
            [
                "name" => "salsa putri",
                "email"=> "salsa@gmail.com",
                "city"=> "jakarta"
            ],
        ];
        return view("customers.index", ["customers"=>$customers]);
    }
}
