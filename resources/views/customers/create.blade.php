@extends("layouts.app")
@section("content")
<div class="row mt-5">
  <div class="col-lg-12 d-flex justify-content-end">
      <a href="{{route('customers')}} "class="btn btn-primary">Back</a>
  </div>
</div>
<div class="row">
            <div class="col-lg-12">
              <h1>Input Customer Data</h1>

              <form action="{{route ('customers.store') }} " method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Customer nama</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="isi nama">
                    </div>
                     <div class="mb-3">
                        <label for="email" class="form-label">Customer email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="isi email dengan format yang benar">
                    </div>

                     <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control"  id="city" name="city" placeholder="isi kota dengan benar">
                    </div>
                    <div class="mb-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary"  > Save Data Customer</button>
                       

                    </div>

                    
              </form>
    
    </div>    
  </div>

@endsection
           