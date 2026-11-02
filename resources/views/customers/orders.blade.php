@extends("layouts.app")
@section("content")
<h1>Data Total Order</h1>
<table class="table">
    <thead>
        <tr>
        <th scope="col">No</th>
        <th scope="col">No Order</th>
        <th scope="col">Nama Costemer</th>
        <th scope="col">Total Harga</th>
        </tr>
    </thead>

  <tbody>
    @php $no =1; @endphp
    @foreach($orders as $order)
    <tr>
        <td>{{$no}}</td>
        <td>{{$order ['order_number'] }}</td>
        <td>{{$order ['customer_name'] }}</td>
        <td>{{$order ['total_price'] }}</td>
    </tr>
    @php $no++; @endphp
    @endforeach
  </tbody>
  @endsection