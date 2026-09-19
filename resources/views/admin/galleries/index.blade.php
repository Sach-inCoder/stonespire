@extends('admin.layouts.app')
@section('page-title', 'Gallery')
@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h4 class="mb-0">
            Gallery
        </h4>

        <a href="{{ route('admin.galleries.create') }}"
           class="btn btn-primary">
            <i class="fa fa-plus"></i>
            Add Gallery
        </a>

    </div>


    <div class="card">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead>
                        <tr>
                            <th width="60">#</th>
                            <th width="120">Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th width="150">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($galleries as $gallery)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                <img
                                    src="{{ asset($gallery->image) }}"
                                    alt="{{ $gallery->title }}"
                                    width="100"
                                    height="70"
                                    style="object-fit: cover;"
                                >
                            </td>

                            <td>
                                {{ $gallery->title }}
                            </td>

                            <td>
                                <span class="badge bg-info">
                                    {{ ucfirst($gallery->category) }}
                                </span>
                            </td>

                            <td>
                                {{ $gallery->sort_order }}
                            </td>

                            <td>

                                @if($gallery->status)

                                    <span class="badge bg-success">
                                        Active
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        Inactive
                                    </span>

                                @endif

                            </td>

                            <td>

                                <a href="{{ route('admin.galleries.edit', $gallery) }}"
                                   class="btn btn-sm btn-warning">

                                    <i class="fa fa-edit"></i>

                                </a>


                                <form
                                    action="{{ route('admin.galleries.destroy', $gallery) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Are you sure you want to delete this image?')"
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
                            <td colspan="7"
                                class="text-center">

                                No gallery images found.

                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection