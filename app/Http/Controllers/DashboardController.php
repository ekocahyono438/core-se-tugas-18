<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
     public function index(){
        // select *from
        $dashboards = Customer::paginate(5);
        return view ('dashboard.index', ['dashboards'=>$dashboards]);
    }

    public function create(){
        return view('dashboard.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'city' => 'required'
        ]);

        Customer::create($request->all());
        return redirect()->route('dashboard')->with('success', 'Data customer berhasil ditambahkan.');
    }

    public function show($id){
        $dashboard = Customer::findOrFail($id);
        return view('dashboard.show', ['dashboard'=>$dashboard]);
    }

    public function edit($id){
        $dashboard = Customer::findOrFail($id);
        return view('dashboard.edit', ['dashboard'=>$dashboard]);
    }
    
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'city' => 'required'
        ]);

        $dashboard = Customer::findOrFail($id);
        $dashboard->update($request->all());
        return redirect()->route('dashboard')->with('success', 'Data customer berhasil diperbarui.');
    }

    public function destroy($id){
        $dashboard = Customer::findOrFail($id);
        $dashboard->delete();
        return redirect()->route('dashboard')->with('success', 'Data customer berhasil dihapus.');
    }
}
