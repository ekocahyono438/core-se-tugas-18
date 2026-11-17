@extends("layouts.admin")
@section("content")
<div class="row mt-5">
  <div class="col-lg-12 d-flex justify-content-end">
      <a href="{{route('orders')}} "class="btn btn-primary nav-zoom "> <i class="fa-solid fa-rotate-left"></i> Back</a>
  </div>
</div>
<div class="row">
            <div class="col-lg-12">
              <h1>Edit Order Customer</h1>

              <form action="{{ route('orders.update', $orders->id) }}" method="POST">
                @csrf
                @method("PUT")
               
                     @include ('orders._form')
                     <div class="mt-3">
                      <a href="{{ route ('orders')}}" class="btn btn-secondary nav-zoom "> Cencel</a>
                      <button type="submit" class="btn btn-primary nav-zoom "> Update Order Data</button>
                     </div>
              </form>
    
    </div>    
  </div>

@endsection
           