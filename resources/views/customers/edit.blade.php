@extends("layouts.app")
@section("content")
<div class="row mt-5">
  <div class="col-lg-12 d-flex justify-content-end">
      <a href="{{route('customers')}} "class="btn btn-primary"> <i class="fa-solid fa-arrow-left"> </i>Back</a>
  </div>
</div>
<div class="row">
            <div class="col-lg-12">
              <h1>Edit Data CUstomer</h1>

              <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                @csrf
                @method("PUT")
               
                     @include ('customers._form',[
                     'buttonText' => 'update Customer Data',
                     'customer'=> $customer
                  
               ])
                    
              </form>
    
    </div>    
  </div>

@endsection
           