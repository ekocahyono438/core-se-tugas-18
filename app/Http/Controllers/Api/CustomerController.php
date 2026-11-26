<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::latest()->paginate(10);
        return response()->json([
            'mesage' => 'Customers retrieved successfully',
            'data' => $customers
        ], 200);
    }
    public function show(Customer $customer){
        return response()->json([
            'message' => 'Customer retrieved successfully',
            'data' => $customer
        ], 200);
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'city' => 'nullable|string|max:150',
         
        ]);

        $customer = Customer::create($validated);

        return response()->json([
            'message' => 'Customer created successfully',
            'data' => $customer
        ], 201);
    }
    public function update(Request $request, Customer $customer){
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:customers,email,'.$customer->id,
            'city' => 'sometimes|string|max:150',
         
        ]);

        $customer->update($validated);

        return response()->json([
            'message' => 'Customer updated successfully',
            'data' => $customer
        ], 200);
    }
    public function destroy(Customer $customer){
        
        $customer = Customer::find($customer->id);
        if (!$customer) {
            return response()->json([
                'message' => 'Customer not found'
            ], 404);
        }

        $customer->delete();
        return response()->json([
            'message' => 'Customer deleted successfully'
        ], 200);
    }
}


   
    
