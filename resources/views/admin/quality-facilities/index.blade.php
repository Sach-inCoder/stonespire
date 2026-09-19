@extends('admin.layouts.app')
@section('page-title', 'Qualities')
@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between mb-4">

        <h4>Qualities</h4>

        <a href="{{ route('admin.quality-facilities.create') }}"
           class="btn btn-primary">
            <i class="fa fa-plus"></i> Add qualities
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
                            <th>Order</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($facilities as $qualities)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>
                                @if($qualities->image)
                                    <img src="{{ asset($qualities->image) }}"
                                         width="60"
                                         height="60"
                                         style="object-fit:cover;">
                                @endif
                            </td>

                            <td>{{ $qualities->name }}</td>

                            <td>{{ $qualities->sort_order }}</td>

                            <td>
                                @if($qualities->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>

                            <td>

                                <a href="{{ route('admin.quality-facilities.edit', $qualities) }}"
                                   class="btn btn-sm btn-warning">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form action="{{ route('admin.quality-facilities.destroy', $qualities) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Delete this qualities?')">

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
                                No qualities found.
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