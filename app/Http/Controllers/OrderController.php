<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Customer;
use App\Models\Order;
use App\Services\OrderServices;
use Illuminate\http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;

class OrderController extends Controller
{
   public function index(Request $request)
{
    $search = $request->query('search') ?? ($_GET['search'] ?? null);
    $status = $request->query('status') ?? ($_GET['status'] ?? null);

    $query = Order::query();

    if (!empty($status)) {
        $query->where('status', $status);
    }

    if (!empty($search)) {
        $query->whereHas('Customer', function ($customerQuery) use ($search) {
            $customerQuery->where('name', 'like', '%' . $search . '%');
        });
    }

    $totalOrders = (clone $query)->count();
    $totalAmount = (clone $query)->sum('total');

    $orders = (clone $query)
        ->with('Customer', 'service')
        ->latest()
        ->paginate(5)
        ->withQueryString();

    $status_data = Order::query()
        ->select('status')
        ->distinct()
        ->orderBy('status')
        ->pluck('status');

    return view('orders.index', compact(
        'orders',
        'search',
        'status',
        'status_data',
        'totalOrders',
        'totalAmount'
    ));

    }

    public function create(){
        $customers = Customer::orderBy('name')->get();
        $services = Service::orderBy('name')->get();
        return view('orders.create', compact('customers', 'services'));
    }

     public function store(OrderRequest $request, OrderServices $orderServices){

      $validated = $request->validated();

      $customer = Customer::findOrFail($validated['customer_id']);

      unset($validated['customer_id']);

      $orderServices->createOrder($customer, $validated);
      
      return redirect()->route('orders');
       
      //$status = $request->total < 1000000 ? 'approved' : 'pending';

      
    }

    public function show( int $id){
      $orders= Order::findOrfail($id);
      return view('orders.show',['orders'=> $orders]);
    }

    public function edit(int $id){
      $order = Order::findOrfail($id);
      $customers = Customer::all();
      $services  = Service::orderBy('name')->get();

      return view('orders.edit', compact('order', 'customers', 'services'));
    }

    public function update(OrderRequest $request , int $id){
      //$validated= Customer::findOrfail($id);
      $orders= Order::findOrfail($id);

      $orders->update([
        'customer_id' => $request->customer_id,
        'order_number' => $request->order_number,
        'service_id' => $request->service_id,
        'order_date' => $request->order_date,
        'total' => $request->total,
        'status' => $request->status,
      ]);
      return redirect()->route('orders');
    }

    public function approve(Order $order){
      $order ->update([
        'status'=> 'approved',
        'approved_by' => Auth::user()->id,
        'approved_at' => now(),
      ]);
      return redirect()->back()->with('success', 'Order berhasil di-approve.');
    }

    public function destroy( int $id){
        $orders= Order::findOrfail($id);
        $orders->delete();
        
        return redirect()->route('orders')->with('success', 'order berhasil dihapus.');
  }
  


}