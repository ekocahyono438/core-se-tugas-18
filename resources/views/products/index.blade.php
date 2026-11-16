@extends("layouts.admin")
@section("content")
<div class="row mt-5">
  <div class="col-lg-12 d-flex justify-content-end">
      <a href="{{route('products.create')}} "class="btn btn-primary"> <i class="fa-solid fa-plus"></i> Tambah Produk</a>
  </div>
</div>
<div class="row">
    <div class="col-lg-12">
      <h1> Data Produk</h1>

      @if(session('success'))
      <div class="alert alert-success">{{ session ('success') }}</div>
      @endif

    <table class="table">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Prodok</th>
            <th scope="col">nama Produk</th>
            <th scope="col">Harga Produk</th>
            <th scope="col">Stok Produk</th>
             <th scope="col">Action</th>
            </tr>
            </tr>
        </thead>

        <tbody>
              @php $no =1; @endphp
              @foreach($products as $product)
              <tr>
                  <td>{{ $no }}.</td>
                  <td>{{ $product['product_code'] }}</td>
                  <td>{{ $product['product_name'] }}</td>
                  <td> Rp{{ $product['product_price'] }}</td>
                  <td>{{ $product['current_stock'] }} pcs</td>
                  <td >
                    <a href="{{ route('products.show', $product['id']) }}" class="btn btn-primary"> <i class="fa-solid fa-eye"></i> View Detail</a>
                    <a href="{{ route('products.edit', $product['id']) }}" class=" btn btn-warning"> <i class="fa-solid fa-pen-to-square"></i> Edit Data</a>
                    <form action="{{ route('products.delete', $product['id']) }}"
                      method="POST" style="display:inline;"
                      onsubmit="return confirm('apakah anda yakin menghapus data Produk ini?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">  <i class="fa-solid fa-trash"></i> Delete</button>
                    </form>
                  </td>
              </tr>
              @php $no++; @endphp
              @endforeach
        </tbody>
      
    </table>
    </div>    
  </div>
  <i class="bi bi-archive-fill"></i>

@endsection
           