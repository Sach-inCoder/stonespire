@extends('admin.layouts.app')
@section('page-title', 'Products')
@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1">Products</h4>
            <p class="text-muted mb-0">
                Manage your printing products.
            </p>
        </div>

        <a href="{{ route('admin.products.create') }}"
           class="btn btn-primary">
            <i class="fa fa-plus"></i>
            Add product
        </a>
    </div>



    <div class="card">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered align-middle">

                    <thead>
                        <tr>
                            <th width="70">#</th>
                            <th width="100">Image</th>
                            <th>product</th>
                            <th width="100">Order</th>
                            <th width="100">Status</th>
                            <th width="150">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($products as $product)

                        <tr>

                            <td>
                                {{ str_pad($product->id, 2, '0', STR_PAD_LEFT) }}
                            </td>

                            <td>
                                @if($product->image)
                                    <img
                                        src="{{ asset($product->image) }}"
                                        alt="{{ $product->title }}"
                                        width="80"
                                        height="60"
                                        style="object-fit: cover; border-radius: 6px;"
                                    >
                                @else
                                    <span class="text-muted">No image</span>
                                @endif
                            </td>

                            <td>
                                <div class="fw-bold">
                                    {{ $product->name }}
                                </div>

                                

                                <div class="small text-muted mt-1">
                                    {{ Str::limit($product->short_description, 80) }}
                                </div>
                            </td>


                            <td>
                                {{ $product->sort_order }}
                            </td>

                            <td>
                                @if($product->status)
                                    <span class="badge bg-success">
                                        Active
                                    </span>
                                @else
                                    <span class="badge bg-secondary">
                                        Inactive
                                    </span>
                                @endif
                            </td>

                            <td>

                                <a href="{{ route('admin.products.edit', $product) }}"
                                   class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form
                                    action="{{ route('admin.products.destroy', $product) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Are you sure you want to delete this product?')"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="text-center py-4">
                                No products found.
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>
                <div class="pagination-links my-3">
                    {{ $products->links() }}
                </div>
            </div>

        </div>

    </div>

</div>

@endsection