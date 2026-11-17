@extends("layouts.admin")
@section("content")
<div class="row mt-5">
  <div class="col-lg-12 d-flex justify-content-end">
      <a href="{{ route('orders') }} "class="btn btn-primary nav-zoom"> <i class="fa-solid fa-rotate-left"></i> Back</a>
  </div>
</div>
<div class="row">
            <div class="col-lg-12">
              <h1>Input Order Customer </h1>

              <form action="{{route ('orders.store') }} " method="POST">
                @csrf
               @include ('orders._form')
               <div class="mt-5">
                <a href="{{ route ('orders')}}" class="btn btn-warning nav-zoom"> <i class="fa-solid fa-ban"></i> Cancel</a>
                <button type="submit" class="btn btn-primary nav-zoom"> <i class="fa-solid fa-circle-down"></i> Save Order Data</button>
               </div>
              </form>
    
    </div>    
  </div>

@endsection
           