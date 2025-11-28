@extends('layouts.app')
@section('title', 'Product List')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @if (session('success'))
            <div class="alert alert-primary alert-dismissible" role="alert">
                {{ session('success') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Responsive Table -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2">
                    <h5 class="mb-0">Product List</h5>
                    <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm">
                        <i class="bx bx-plus"></i> Create
                    </a>
                </div>
                <!-- Search Form -->
                <form action="{{ route('product.index') }}" method="GET" class="d-flex"
                      style="width: 300px;">
                    <input type="text" name="search"
                           class="form-control form-control me-2"
                           placeholder="Search..."
                           value="{{ request('search') }}">
                    <button class="btn btn-primary btn-sm" type="submit">
                        <i class="bx bx-search"></i>
                    </button>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}</td>
                                <td>
                                    @if ($product->image)
                                        <img
                                            src="{{ $product->image ? asset('storage/' . $product->image) : asset('assets/img/default-product.png') }}"
                                            alt="{{ $product->name }}" class="img-thumbnail" width="80"/>
                                    @endif
                                </td>
                                <td>
                                    <b>{{ $product->name }}</b> <br/>
                                    <small>{{ Str::limit($product->description, 75) }}</small>
                                </td>
                                <td>{{ $product->category ? $product->category->name : '-' }}</td>
                                <td>IDR {{ number_format($product->price) }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>
                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-primary">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <form id="delete-form-{{ $product->id }}"
                                          action="{{ route('product.destroy', $product->id) }}" method="POST"
                                          style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger"
                                                onclick="deleteConfirm('{{ $product->id }}', '{{ $product->name }}')">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div class="mt-3 d-flex justify-content-center">
                    {{ $products->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function deleteConfirm(id) {
            Swal.fire({
                title: 'Are you sure want to delete this product?',
                text: 'Deleted data cannot be recovered!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Delete!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
@endpush
