<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
     public function index(){
        // select *from
        $dashboards = Customer::paginate(2);
        return view ('dashboard.index', ['dashboards'=>$dashboards]);
    }
}
