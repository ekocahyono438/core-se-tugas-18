@extends("layouts.app")
@section("content")
<div class="row mt-5">
  <div class="col-lg-12 d-flex justify-content-end">
      <a href="{{route('products')}} "class="btn btn-primary">Back</a>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <h1>Detail Data Produck </h1>
    <form action="">
        @csrf
         <div class="mb-3">
          <label for="name"  >Detail Kode Produk </label>
              <div class="fw-bold" >{{ $products->product_code }}</div>
          </div>   

          <label for="name"  class="form-label" >Detail Nama Produk </label>
              <div class="fw-bold">{{ $products->product_name }}</div>
          </div>  
          
          <label for="name"  class="form-label" >Detail Harga Produk</label>
              <div class="fw-bold">{{ $products->product_price }}</div>
          </div>   

          <label for="name"  class="form-label" >Detail Stok Produk</label>
              <div class="fw-bold">{{ $products->current_stock }}</div>
          </div>   
      </div>    
    </form>
     
  </div>

@endsection
           