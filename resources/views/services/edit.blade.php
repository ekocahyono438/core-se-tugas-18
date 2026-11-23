@extends("layouts.admin")
@section("content")
<div class="row mt-5">
  <div class="col-lg-12 d-flex justify-content-end">
      <a href="{{route('services')}} "class="btn btn-primary"> <i class="fa-solid fa-arrow-left"> </i>Back</a>
  </div>
</div>
<div class="row">
            <div class="col-lg-12">
              <h1>Edit Data services</h1>

              <form action="{{ route('services.update', $service->id) }}" method="POST">
                @csrf
                @method("PUT")
               
                     @include ('services._form',[
                     'buttonText' => 'update services Data',
                     'service'=> $service
                  
               ])
                    
              </form>
    
    </div>    
  </div>

@endsection
           