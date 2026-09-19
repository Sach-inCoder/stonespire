@extends('admin.layouts.app')
@section('page-title', 'Testimonials')
@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between mb-4">

        <h4>Testimonials</h4>

        <a href="{{ route('admin.testimonials.create') }}"
           class="btn btn-primary">
            <i class="fa fa-plus"></i> Add Testimonial
        </a>

    </div>


    <div class="card">
        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered align-middle">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Rating</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($testimonials as $testimonial)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>
                                @if($testimonial->image)
                                    <img src="{{ asset($testimonial->image) }}"
                                         width="60"
                                         height="60"
                                         style="object-fit:cover;">
                                @endif
                            </td>

                            <td>{{ $testimonial->name }}</td>

                            <td>{{ $testimonial->designation }}</td>

                            <td>
                                {{ $testimonial->rating }} / 5
                            </td>

                            <td>{{ $testimonial->sort_order }}</td>

                            <td>
                                @if($testimonial->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>

                            <td>

                                <a href="{{ route('admin.testimonials.edit', $testimonial) }}"
                                   class="btn btn-sm btn-warning">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form action="{{ route('admin.testimonials.destroy', $testimonial) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Delete this testimonial?')">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="8" class="text-center">
                                No testimonials found.
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