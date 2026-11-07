@extends("layouts.app")
@section("content")
<div class="row mt-5">
  <div class="col-lg-12 d-flex justify-content-end">
      <a href="{{route('products')}} "class="btn btn-primary">Back</a>
  </div>
</div>
<div class="row">
            <div class="col-lg-12">
              <h1>Input Produk </h1>

              <form action="{{route ('products.store') }} " method="POST">
                @csrf
                <div class="mb-3">
                    <label for="product_code" class="form-label">Kode Produk</label>
                        <input type="text" class="form-control" id="product_code" name="product_code" placeholder="isi nama produk dengan jelas">
                    </div>
                     <div class="mb-3">
                        <label for="product_name" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="isi nama produk dengan format yang benar">
                    </div>

                     <div class="mb-3">
                        <label for="product_price" class="form-label">Harga Porduk</label>
                        <input type="text" class="form-control"  id="product_price" name="product_price" placeholder="isi haraga produk dengan benar">
                    </div>

                     <div class="mb-3">
                        <label for="current_stock" class="form-label">Stok Produk</label>
                        <input type="text" class="form-control"  id="current_stock" name="current_stock" placeholder="isi stok produk dengan benar">
                    </div>
                    

                    <div class="mb-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary" > Save Data produk</button>
                       

                    </div>

                    
              </form>
    
    </div>    
  </div>

@endsection
           