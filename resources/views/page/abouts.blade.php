
@extends("layouts.app")
@section("content")
<h1>Tentang Toko</h1>
<table class="table">
    <thead>
        <tr>
        <th scope="col">Nama Toko</th>
        <th scope="col">ALamat</th>
        <th scope="col">No Telpon</th>
        </tr>
    </thead>
  

  <tbody>
    @php $no =1; @endphp
    @foreach($about as $order)
    <tr>
     
        <td>{{$order ['toko_name']  }}</td>
        <td>{{$order ['alamat'] }}</td>
        <td>{{$order ['no_tlp'] }}</td>
       
    </tr>
   
    @php $no++; @endphp
    @endforeach
    
  </tbody>

  @endsection
  