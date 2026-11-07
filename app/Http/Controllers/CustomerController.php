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
      return redirect()->route('customers');
    }

    public function show($id){
      $customer= Customer::findOrfail($id);
      return view('customers.show',['customer'=> $customer]);
    }

    public function edit($id){
      $customer= Customer::findOrfail($id);

      return view('customers.edit',['customer'=> $customer]);
    }

    public function update(Request $request , $id){
      $customer= Customer::findOrfail($id);

      $customer->update([
        'name' => $request->name,
        'email' => $request->email,
        'city' => $request->city
      ]);
      return redirect()->route('customers');
  }

  public function destroy($id){
    $customer= Customer::findOrfail($id);

    $customer->delete();
    return redirect()->route('customers')->with('seccess', 'customer berhasil dihapus.');
  }
  

}
