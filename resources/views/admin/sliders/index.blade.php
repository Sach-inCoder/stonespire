@extends('admin.layouts.app')
@section('page-title', 'Sliders')
@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h4 class="mb-0">
            Sliders
        </h4>

        <a href="{{ route('admin.sliders.create') }}"
           class="btn btn-primary">

            <i class="fa fa-plus"></i>
            Add Slider

        </a>

    </div>



    <div class="card">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead>

                        <tr>
                            <th>#</th>
                            <th width="150">Image</th>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th width="130">Action</th>
                        </tr>

                    </thead>

                    <tbody>

                    @forelse($sliders as $slider)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>

                                @if($slider->image)

                                    <img
                                        src="{{ asset($slider->image) }}"
                                        alt="{{ $slider->title }}"
                                        width="130"
                                        height="70"
                                        style="object-fit: cover;"
                                    >

                                @endif

                            </td>

                            <td>
                                {{ $slider->title ?: '-' }}
                            </td>

                            <td>
                                {{ $slider->subtitle ?: '-' }}
                            </td>

                            <td>
                                {{ $slider->sort_order }}
                            </td>

                            <td>

                                @if($slider->status)

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

                                <a href="{{ route('admin.sliders.edit', $slider) }}"
                                   class="btn btn-sm btn-warning">

                                    <i class="fa fa-edit"></i>

                                </a>


                                <form
                                    action="{{ route('admin.sliders.destroy', $slider) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Delete this slider?')"
                                >

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

                            <td colspan="7"
                                class="text-center py-4">

                                No sliders found.

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