    @extends("layouts.app")
    @section("content")

    <h1>Customer Produk</h1>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Prodak</th>
            <th scope="col">Harga</th>
            
            </tr>
        </thead>

    <tbody>
    @php $no =1; @endphp
    @foreach($products as $product)
    <tr>
        <td>{{$no}}</td>
        <td>{{$product ['name_products'] }}</td>
        <td>{{$product ['price'] }}</td>
        
    </tr>
    @php $no++; @endphp
    @endforeach
  </tbody>
  </table>
    @endsection