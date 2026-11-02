<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about(){
        $about= [
            [
                "toko_name"=>"Adi Jaya",
                "alamat"=>"Tangerang",
                "no_tlp"=>"08571122334"
            ],

           
        ];
        return view ("page.abouts", ["about"=>$about]);
        
    }
}
