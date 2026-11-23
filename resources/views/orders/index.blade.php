@extends("layouts.admin")
@section("content")
  <div class="row mt-5">
    <div class="col-lg-12 d-flex justify-content-end">
      @can('manager.orders')
          <a href="{{route('orders.create')}} "class="btn btn-primary nav-zoom"> 
          <i class="fa-solid fa-plus"></i> Tambah Order</a>
      @endcan
    </div>
  </div>

    <div class="row-mt-5">
      <div class="col-lg-12">
        <form action="{{ route('orders') }}" method="GET" class="mt-4">
          <div class="row g-2">
            <div class="col-md-5">
              <input type="text" name="search" id="search" class="form-control" 
              placeholder="Cari Nama Customer" value="{{ $search ?? '' }}" >
            </div>
            <div class="col-md-3">
              <select name="status" class="form-select">
                <option value="">semua status</option>
                @foreach ($status_data as $data)
                <option value="{{ $data }}" {{ ($status ?? '') === $data ? 'selected' : ' ' }}>{{ $data }}</option>
                @endforeach
              </select>
            </div>
                <div class="col-md-2">
                  <button type="submit" class="btn btn-primary w-100 nav-zoom">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    Cari
                  </button>
                </div>

              <div class="col-md-2">
                  <a href="{{ route ('orders')}}" class="btn btn-secondary w-100 nav-zoom">
                    <i class="fa fa-refresh" aria-hidden="true"></i>
                    Reset
                  </a>
              </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-md-6">
        <div class="card border-1 shadow-sm">
          <div class="card-body">
            <h6 class="text-center">Total Order</h6>
            <h3 class="text-center fw-bold">
              {{ number_format($totalOrders,0, ', ', '.' ) }}
            </h3>
            <small class="text-center d-block text-muted">
              jumlah order sesuai filter aktif
            </small>
          </div>
        </div>
      </div>

       <div class="col-md-6">
        <div class="card border-1 shadow-sm">
          <div class="card-body">
            <h6 class="text-center">Total Transaksi</h6>
            <h3 class="text-center fw-bold">
              Rp{{ number_format(  $totalAmount,0, ', ', '.' ) }}
            </h3>
            <small class="text-center d-block text-muted" >
              jumlah total transaksi order sesuai filter aktif
            </small>
          </div>
        </div>
      </div>
    </div>
      


<div class="row mt-2">
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
            <th scope="col">Service</th>
            <th scope="col">Order date</th>
            <th scope="col">total</th>
            <th scope="col">status</th>
             <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>
             
              @foreach($orders as $order)
                 <tr>
                   <td>{{ $orders->firstItem() + $loop->index }}</td>
                    <td>{{ $order->Customer?->name ?? '-'}}</td>
                    <td>{{ $order->order_number ?? '-' }}</td>
                    <td>{{ $order->service?->description ?? 'belum ada service' }}</td>
                    <td>{{ $order->order_date?->format('d-m-Y') }}</td>
                    <td>Rp{{ number_format($order->total, 0, ',', '.') }}</td>
                    <td>{{ $order->status }}</td>
                  <td >
                    @can('approve.orders', $order)
                     <form action="{{ route('orders.approve', $order['id']) }}"
                        method="POST" style="display:inline;"
                        onsubmit="return confirm('apakah anda yakin approve data ini?')">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success" >
                       <i class="fas fa-thumbs-up"></i> Approve</button>
                      </form>
                    @endcan

                    @can('view.orders')
                      <a href="{{ route('orders.show', $order['id']) }}" class="btn btn-primary nav-zoom"> 
                      <i class="fa-solid fa-eye"></i>Detail</a>
                    @endcan

                    @can('manager.orders') 
                      <a href="{{ route('orders.edit', $order['id']) }}" class="btn btn-warning nav-zoom">  
                      <i class="fa-solid fa-pen-to-square"></i>Edit</a>
                    @endcan

                    @can('delete.orders')
                      <form action="{{ route('orders.delete', $order['id']) }}"
                        method="POST" style="display:inline;"
                        onsubmit="return confirm('apakah anda yakin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger nav-zoom" ><i class="fa-solid fa-trash"></i> Delete</button>
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
           