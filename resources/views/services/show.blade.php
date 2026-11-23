@extends("layouts.admin")
@section("content")
<div class="row mt-5">
  <div class="col-lg-12 d-flex justify-content-end">
      <a href="{{route('services')}} "class="btn btn-primary">Back</a>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <h1>Detail Data service</h1>
    <form action="">
         <div class="mb-3">
          <label for="name" >Detail Customer nama</label>
              <div class="fw-bold">{{ $services->name }}</div>
          </div>   

          <label for="name" >Detail Customer description</label>
              <div class="fw-bold">{{ $services->description }}</div>
          </div>  
          
          <label for="name" >Detail Customer price</label>
              <div class="fw-bold">{{ $services->price }}</div>
          </div>   

          <label for="name" >Detail Customer duration_day</label>
              <div class="fw-bold">{{ $services->duration_day }}</div>
          </div>   

           <label for="name" >Detail Customer status</label>
              <div class="fw-bold">{{ $services->status }}</div>
          </div>   
      </div>    
    </form>
  </div>
</div>

@endsection
           