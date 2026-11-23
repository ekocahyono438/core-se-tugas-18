<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicesRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
     public function index(){
        // select *from
        $services= Service::paginate(5);
        return view ('services.index', ['services'=>$services]);
    }
    public function create(){
        return view('services.create');
    }

    public function store(ServicesRequest $request ){
      $validated = $request->validated();
      Service::create([
        
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'duration_days' => $request->duration_days,
        'status' => $request->status,
        
      ]);
      return redirect()->route('services');
    }

    public function show($id){
      $services= Service::findOrfail($id);
      return view('services.show',['services'=> $services]);
    }

    public function edit($id){
      $services= Service::findOrfail($id);

      return view('services.edit',['services'=> $services]);
    }

    public function update(Request $request , $id){
      $services = Service::findOrfail($id);

      $services->update([
       
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'duration_days' => $request->duration_days,
        'status' => $request->status
       
      ]);
      return redirect()->route('services');
  }

  public function destroy($id){
    $services= Service::findOrfail($id);

    $services->delete();
    return redirect()->route('services')->with('seccess', 'services berhasil dihapus.');
  }
  

}


