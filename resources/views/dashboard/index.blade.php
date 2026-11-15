@extends("layouts.admin")
@section("content")
<div class="row mt-5">
  <div class="col-lg-12 d-flex justify-content-end">
      <a href="{{route('customers.create')}} "class="btn btn-primary">  <i class="fa-solid fa-plus"></i>Tambah Customer</a>
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
             
              @foreach( $dashboards as $dashboard)
              <tr>
                  <td>{{ $dashboards->firstItem() + $loop->index }}</td>
                  <td>{{ $dashboard['name'] }}</td>
                  <td>{{ $dashboard['email'] }}</td>
                  <td>{{ $dashboard['city'] }}</td>
                  <td >
                    <a href="{{ route('customers.show', $dashboard['id']) }}" class="btn btn-primary ">  <i class="fa-solid fa-eye"></i> Detal </a>
                    <a href="{{ route('customers.edit', $dashboard['id']) }}" class="btn btn-warning "> <i class="fa-solid fa-pen-to-square"></i>Edit</a>
                    <form action="{{ route('customers.delete', $dashboard['id']) }}"
                      method="POST" style="display:inline;"
                      onsubmit="return confirm('apakah anda yakin menghapus data ini?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger" >  <i class="fa-solid fa-trash"></i>Delete</button>
                    </form>
                  </td>
              </tr>
             
              @endforeach
        </tbody>
      
    </table>
    </div>    
  </div>
  
    <div class="col-lg-12">
      {{ $dashboards->links() }}
    </div>
  

@endsection
           