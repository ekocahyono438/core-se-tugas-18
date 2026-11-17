@extends("layouts.admin")
@section("content")
<div class="row mt-5">
  <div class="col-lg-12 d-flex justify-content-end">
      <a href="{{route('customers')}} "class="btn btn-primary">  <i class="fa-solid fa-rotate-left"></i>Back</a>
  </div>
</div>
<div class="row">
            <div class="col-lg-12">
              <h1>Input Customer Data</h1>

              <form action="{{route ('customers.store') }} " method="POST">
                @csrf
               @include ('customers._form', [
                'buttonText' => 'Save Customer Data',
                   'customer'=> null
               ])
                 
              </form>
    
    </div>    
  </div>

@endsection
           