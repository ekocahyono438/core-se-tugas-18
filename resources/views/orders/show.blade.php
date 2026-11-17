@extends("layouts.admin")
@section("content")
<div class="row mt-5">
  <div class="col-lg-12 d-flex justify-content-end">
      <a href="{{route('orders')}} "class="btn btn-primary nav-zoom"> 
      <i class="fa-solid fa-rotate-left"></i> Back</a>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <h1>Detail Data Order</h1>
    <form action="">
         <div class="mb-3">
              <label for="name" >Detail  Customer nama </label>
              <div class="fw-bold">{{ $orders->customer_id }}</div>
          </div>   

         <div class="mb-3">
              <label for="name" >Detail Order Number</label>
              <div class="fw-bold">{{ $orders->order_number }}</div>
          </div>  

          <div class="mb-3">
              <label for="name" >Detail Order Date</label>
              <div class="fw-bold">{{ $orders->order_date }}</div>
          </div> 

          <div class="mb-3">
              <label for="name" >Detail Data Total</label>
              <div class="fw-bold">{{ $orders->total }}</div>
          </div>   

          <div class="mb-3">
              <label for="name" >Detail Data Status</label>
              <div class="fw-bold">{{ $orders->status }}</div>
          </div>   
      </div>
    </form>
  </div>
</div>

@endsection
           