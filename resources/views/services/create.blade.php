@extends("layouts.admin")
@section("content")
<div class="row mt-5">
  <div class="col-lg-12 d-flex justify-content-end">
      <a href="{{route('services')}} "class="btn btn-primary">  
      <i class="fa-solid fa-rotate-left"></i>Back</a>
  </div>
</div>
<div class="row">
            <div class="col-lg-12">
              <h1>Input Services Data</h1>

              <form action="{{route ('services.store') }} " method="POST">
                @csrf
               @include ('services._form', [
                'buttonText' => 'Save service Data',
                   'service'=> null
               ])
                 
              </form>
    
    </div>    
  </div>

@endsection
           