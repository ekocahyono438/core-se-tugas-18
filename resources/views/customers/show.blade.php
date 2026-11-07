@extends("layouts.app")
@section("content")
<div class="row mt-5">
  <div class="col-lg-12 d-flex justify-content-end">
      <a href="{{route('customers')}} "class="btn btn-primary">Back</a>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <h1>Detail Data Customer</h1>
    <form action="">
         <div class="mb-3">
          <label for="name" >Detail Customer nama</label>
              <div class="fw-bold">{{ $customer->name }}</div>
          </div>   

          <label for="name" >Detail Customer email</label>
              <div class="fw-bold">{{ $customer->email }}</div>
          </div>  
          
          <label for="name" >Detail Customer city</label>
              <div class="fw-bold">{{ $customer->city }}</div>
          </div>   
      </div>    
    </form>
     
  </div>

@endsection
           