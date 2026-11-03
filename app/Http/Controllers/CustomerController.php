<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        // select *from
        $customers = Customer::all();
        return view ('Customers.index', ['customers'=>$customers]);
    }
    public function create(){
        return view('customers.create');
    }
    public function store(Request $request){
      Customer::create([
        'name' => $request->name,
        'email' => $request->email,
        'city' => $request->city,
      ]);
      return redirect()->route('customers')->with('berhasil', 'customer berhasil ditambah');
    }

    public function detail(){

    }
}
