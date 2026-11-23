@extends("layouts.admin")
@section("content")
<div class="row mt-5">
  <div class="col-lg-12 d-flex justify-content-end ">
    @can('manager.services')
      <a href="{{route('services.create')}} "class="btn btn-primary nav-zoom">  
      <i class="fa-solid fa-plus"></i>Tambah service</a>
    @endcan  
  </div>
</div>
<div class="row">
    <div class="col-lg-12">
      <h1> Data services </h1>

      @if(session('success'))
      <div class="alert alert-success">{{ session ('success') }}</div>
      @endif

    <table class="table">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">name</th>
            <th scope="col">description</th>
            <th scope="col">price</th>
            <th scope="col">duration_days</th>
            <th scope="col">status</th>
             <th scope="col">Action</th>
            </tr>
            </tr>
        </thead>

        <tbody>
             
              @foreach($services as $service)
              <tr>
                  <td>{{ $services->firstItem() + $loop->index }}</td>
                  <td>{{ $service['name'] }}</td>
                  <td>{{ $service['description'] }}</td>
                  <td>{{ $service['price'] }}</td>
                  <td>{{ $service['duration_days'] }}</td>
                  <td>{{ $service['status'] }}</td>
                  <td >
                    @can('view.services')
                    <a href="{{ route('services.show', $service['id']) }}" class="btn btn-primary nav-zoom "> 
                    <i class="fa-solid fa-eye"></i> Detal </a>
                    @endcan

                    @can('manager.services')
                    <a href="{{ route('services.edit', $service['id']) }}" class="btn btn-warning nav-zoom "> 
                    <i class="fa-solid fa-pen-to-square"></i>Edit</a>
                    @endcan

                    @can('delete.services')
                    <form action="{{ route('services.delete', $service['id']) }}"
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
      {{ $services->links() }}
    </div>
  

@endsection
           