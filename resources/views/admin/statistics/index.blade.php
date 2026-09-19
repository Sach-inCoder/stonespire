@extends('admin.layouts.app')
@section('page-title', 'Statistics')
@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between mb-4">

        <h4>Statistics</h4>

        <a href="{{ route('admin.statistics.create') }}"
           class="btn btn-primary">
            <i class="fa fa-plus"></i> Add statistic
        </a>

    </div>


    <div class="card">
        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered align-middle">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Label</th>
                            <th>Value</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($statistics as $statistic)

                        <tr>

                            <td>{{ $loop->iteration }}</td>


                            <td>{{ $statistic->label }}</td>

                            <td>{{ $statistic->value }}</td>


                            <td>{{ $statistic->sort_order }}</td>

                            <td>
                                @if($statistic->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>

                            <td>

                                <a href="{{ route('admin.statistics.edit', $statistic) }}"
                                   class="btn btn-sm btn-warning">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form action="{{ route('admin.statistics.destroy', $statistic) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Delete this statistic?')">

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
                                No statistics found.
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