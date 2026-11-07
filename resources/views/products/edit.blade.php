@extends("layouts.app")
@section("content")
<div class="row mt-5">
  <div class="col-lg-12 d-flex justify-content-end">
      <a href="{{route('products')}} "class="btn btn-primary">Back</a>
  </div>
</div>
<div class="row">
            <div class="col-lg-12">
              <h1>Edit Data Produk </h1>

              <form action="{{ route('products.update', $products->id) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="mb-3">
                    <label for="product_code" class="form-label">Kode Produk</label>
                        <input type="text" class="form-control" id="product_code" name="product_code" value="{{ $products->product_code }}" placeholder="isi nama lengkap">
                    </div>
                     <div class="mb-3">
                        <label for="product_name" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $products->product_name }}" placeholder="isi email dengan format yang benar">
                    </div>

                     <div class="mb-3">
                        <label for="product_price" class="form-label">Harga Produk</label>
                        <input type="text" class="form-control" id="product_price" name="product_price" value="{{ $products->product_price}}" placeholder="isi kota yang lengkap">
                    </div>

                    <div class="mb-3">
                        <label for="current_stock" class="form-label">Stok Produk</label>
                        <input type="text" class="form-control" id="current_stock" name="current_stock" value="{{ $products->current_stock}}" placeholder="isi kota yang lengkap">
                    </div>
                    

                    <div class="mb-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary"  > Update Produk Customer</button>
                       

                    </div>

                    
              </form>
    
    </div>    
  </div>

@endsection
           