@extends('admin.layouts.app')
@section('page-title', 'Services')
@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1">Services</h4>
            <p class="text-muted mb-0">
                Manage your printing services.
            </p>
        </div>

        <a href="{{ route('admin.services.create') }}"
           class="btn btn-primary">
            <i class="fa fa-plus"></i>
            Add Service
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
                            <th>Service</th>
                            <th>Tags</th>
                            <th width="100">Order</th>
                            <th width="100">Status</th>
                            <th width="150">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($services as $service)

                        <tr>

                            <td>
                                {{ str_pad($service->id, 2, '0', STR_PAD_LEFT) }}
                            </td>

                            <td>
                                @if($service->image)
                                    <img
                                        src="{{ asset($service->image) }}"
                                        alt="{{ $service->title }}"
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
                                    {{ $service->name }}
                                </div>

                                

                                <div class="small text-muted mt-1">
                                    {{ Str::limit($service->short_description, 80) }}
                                </div>
                            </td>

                            <td>
                                @foreach($service->tags as $tag)
                                    <span class="badge bg-light text-dark border">
                                        {{ $tag->name }}
                                    </span>
                                @endforeach
                            </td>

                            <td>
                                {{ $service->sort_order }}
                            </td>

                            <td>
                                @if($service->status)
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

                                <a href="{{ route('admin.services.edit', $service) }}"
                                   class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form
                                    action="{{ route('admin.services.destroy', $service) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Are you sure you want to delete this service?')"
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
                                No services found.
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>
                <div class="pagination-links my-3">
                    {{ $services->links() }}
                </div>
            </div>

        </div>

    </div>

</div>

@endsection