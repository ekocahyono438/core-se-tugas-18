@extends("layouts.admin")
@section("content")
<div class="row mt-5">
  <div class="col-lg-12 d-flex justify-content-end">
    @can('manage.customers')
      <a href="{{route('customers.create')}} "class="btn btn-primary">  <i class="fa-solid fa-plus"></i>Tambah Customer</a>
    @endcan  
  </div>
</div>
<div class="row">
    <div class="col-lg-12">
      <h1> Data Customer</h1>

      @if(session('success'))
      <div class="alert alert-success">{{ session ('success') }}</div>
      @endif

    <table class="table">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">City</th>
             <th scope="col">Action</th>
            </tr>
            </tr>
        </thead>

        <tbody>
             
              @foreach($customers as $customer)
              <tr>
                  <td>{{ $customers->firstItem() + $loop->index }}</td>
                  <td>{{ $customer['name'] }}</td>
                  <td>{{ $customer['email'] }}</td>
                  <td>{{ $customer['city'] }}</td>
                  <td >
                    @can('view.customers')
                    <a href="{{ route('customers.show', $customer['id']) }}" class="btn btn-primary nav-zoom "> 
                    <i class="fa-solid fa-eye"></i> Detal </a>
                    @endcan

                    @can('manage.customers')
                    <a href="{{ route('customers.edit', $customer['id']) }}" class="btn btn-warning nav-zoom "> 
                    <i class="fa-solid fa-pen-to-square"></i>Edit</a>
                    @endcan

                    @can('delete.customers')
                    <form action="{{ route('customers.delete', $customer['id']) }}"
                      method="POST" style="display:inline;"
                      onsubmit="return confirm('apakah anda yakin menghapus data ini?')">
                      @csrf
                      @method('DELETE')
              
                      <button type="submit" class="btn btn-danger nav-zoom " >  
                      <i class="fa-solid fa-trash"></i>Delete</button>
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
      {{ $customers->links() }}
    </div>
  

@endsection
           