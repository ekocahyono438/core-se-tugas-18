<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View as FacadesView;


class OrderController extends Controller
{
    public function orders(){
        $orders = [
            [
                "order_number"=> "AB001",
                "customer_name"=>"nadia purti",
                "total_price"=>"Rp5000.000"
            ],

            [
                "order_number"=>"AB002",
                "customer_name"=>"bima saputra",
                "total_price"=>"Rp4000.000"
            ],

            [
                "order_number"=>"AB003",
                "customer_name"=>"wowo subianto",
                "total_price"=>"Rp3000.000"
            ]
        ];
        return view ("customers.orders",["orders"=>$orders]);
    }
}
