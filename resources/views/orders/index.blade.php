@extends("layouts.admin")
@section("content")
<div class="row mt-5">
  <div class="col-lg-12 d-flex justify-content-end">
   @can('manage.orders')
      <a href="{{route('orders.create')}} "class="btn btn-primary"> 
      <i class="fa-solid fa-plus"></i> Tambah Order</a>
   @endcan
  </div>
</div>
<div class="row">
    <div class="col-lg-12">
      <h1> Data Order</h1>

      @if(session('success'))
      <div class="alert alert-success">{{ session ('success') }}</div>
      @endif

    <table class="table">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Customer Nama</th>
            <th scope="col">Order number</th>
            <th scope="col">Order date</th>
             <th scope="col">total</th>
              <th scope="col">status</th>
             <th scope="col">Action</th>
            </tr>
            </tr>
        </thead>

        <tbody>
             
              @foreach($orders as $order)
                 <tr>
                   <td>{{ $orders->firstItem() + $loop->index }}</td>
                    <td>{{ $order->customer->name }}</td>
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $order->order_date }}</td>
                    <td>{{ $order->total }}</td>
                    <td>{{ $order->status }}</td>
                  <td >
                    @can('approve.orders', $order)
                     <form action="{{ route('orders.approve', $order['id']) }}"
                        method="POST" style="display:inline;"
                        onsubmit="return confirm('apakah anda yakin menghapus data ini?')">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success" >
                       <i class="fas fa-thumbs-up"></i> Approve</button>
                      </form>
                    @endcan

                    @can('view.orders')
                      <a href="{{ route('orders.show', $order['id']) }}" class="btn btn-primary"> 
                      <i class="fa-solid fa-eye"></i>Detail</a>
                    @endcan

                    @can('manage.orders') 
                      <a href="{{ route('orders.edit', $order['id']) }}" class="btn btn-warning">  
                      <i class="fa-solid fa-pen-to-square"></i>Edit</a>
                    @endcan

                    @can('delete.orders')
                      <form action="{{ route('orders.delete', $order['id']) }}"
                        method="POST" style="display:inline;"
                        onsubmit="return confirm('apakah anda yakin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" ><i class="fa-solid fa-trash"></i> Delete</button>
                      </form>
                    @endcan
                  </td>
              </tr>
            
              @endforeach
        </tbody>
      
    </table>
    </div>    
  </div>
  
    <div class="col-lg-12">
      {{ $orders->links() }}
    </div>
  

@endsection
           