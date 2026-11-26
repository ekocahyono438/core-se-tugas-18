@extends('layouts.adminCopy')

@section('content')
<div class="glass-panel p-4">
    <!-- Header Judul & Tombol Tambah -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">Data Dashbord</h2>
        <a href="{{ route('dashboard') }}" class="btn btn-primary shadow-sm">
            <i class="fa-solid fa-plus me-1"></i> Tambah Dashboard
        </a>
    </div>

    <!-- Tabel Customer -->
    <div class="table-responsive">
        <table class="table table-glass table-hover align-middle">
            <thead>
                <tr class="text-white-50">
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $dashboards as $index => $dashboard)
                <tr>
                    <td>{{  $dashboards->firstItem() + $index }}</td>
                    <td class="fw-medium">{{ $dashboard->name }}</td>
                    <td>{{ $dashboard->email }}</td>
                    <td>{{ $dashboard->city }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('dashboard.show', $dashboard->id) }}" class="btn btn-sm btn-primary">
                                <i class="fa-solid fa-eye me-1"></i> Detail
                            </a>
                            <a href="{{ route('dashboard.edit', $dashboard->id) }}" class="btn btn-sm btn-warning">
                                <i class="fa-solid fa-pen-to-square me-1"></i> Edit
                            </a>
                            <form action="{{ route('dashboard.delete', $dashboard->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fa-solid fa-trash me-1"></i> Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-end mt-3">
        {{  $dashboards->links() }}
    </div>
</div>
@endsection