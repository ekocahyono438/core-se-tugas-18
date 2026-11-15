<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\http\Request;
use App\Http\Requests\OrderRequest;



class OrderController extends Controller
{
    public function index(){
        $orders = Order::with('Customer')->paginate(2);
        return View ("orders.index",["orders"=>$orders]);
    }

    public function create(){
        $customers = Customer::orderBy('name')->get();
        return view('orders.create', ['customers'=> $customers]);
    }

     public function store(OrderRequest $request){
      $validated = $request->validated();
       
      $status = $request->total < 1000000 ? 'approved' : 'pending';

       Order::create([

        'customer_id' => $request->customer_id,
        'order_number' => $request->order_number,
        'order_date' => $request->order_date,
        'total' => $request->total,
        'status' => $status,
        
      ]);
    
      return redirect()->route('orders')->with('success', 'Order berhasil ditambah');
    }

    public function show($id){
      $orders= Order::findOrfail($id);
      return view('orders.show',['orders'=> $orders]);
    }

    public function edit($id){
      $orders= Order::findOrfail($id);
      $customers= Customer::all();

      return view('orders.edit',['orders'=> $orders, 'customers'=>$customers]);
    }

    public function update(OrderRequest $request , $id){
      //$validated= Customer::findOrfail($id);
      $orders= Order::findOrfail($id);

      $orders->update([
        'customer_id' => $request->customer_id,
        'order_number' => $request->order_number,
        'order_date' => $request->order_date,
        'total' => $request->total,
        'status' => $request->status,
      ]);
      return redirect()->route('orders');
    }

    public function approve(Order $order){
      $order ->update([
        'status'=> 'approved',
        'approved_by' => auth::user()->id,
        'approved_at' => now(),
      ]);
      return redirect()->back()->with('success', 'Order berhasil di-approve.');
    }

    public function destroy($id){
        $orders= Order::findOrfail($id);
        $orders->delete();
        
        return redirect()->route('orders')->with('seccess', 'order berhasil dihapus.');
  }
  


}