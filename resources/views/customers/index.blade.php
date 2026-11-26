@extends("layouts.admin")
@section("content")   
    <div class="row mt-5">
        <div class="col-lg-12 d-flex justify-content-end">
            @can('manage-customers')
                <button class="btn btn-primary" onclick="openCreateModal()">
                    Tambah Customer
                </button>
            @endcan
            
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h1>Customer Data</h1>

            <div class="mb-3">
                <input type="text" name="searchCustomer" id="searchCustomer" class="form-control" placeholder="Cari customer...">
            </div>

           
            <div id="alertMessage" class="alert alert-success"></div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">City</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="customerTable"> 
                    </tbody>
                </table>   
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
           <div id="pagination" class="d-flex justify-content-between align-items-center">

           </div>
        </div>
    </div>
@endsection
            
@section('scripts')
    <script src="{{ asset('js/customer.js') }}"></script>
@endsection