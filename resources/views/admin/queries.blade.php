@extends('admin.layouts.app')
@section('page-title', 'Queries')
@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h4 class="mb-0">
            Contact Queries
        </h4>

    </div>



    <div class="card">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead>

                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th width="80">Action</th>
                        </tr>

                    </thead>

                    <tbody>

                    @forelse($queries as $query)

                        <tr>

                            <td>
                                {{ $queries->firstItem() + $loop->index }}
                            </td>

                            <td>
                                {{ $query->name }}
                            </td>

                            <td>
                                {{ $query->email }}
                            </td>

                            <td>
                                {{ $query->phone ?? '-' }}
                            </td>

                            <td>
                                {{ $query->subject ?? '-' }}
                            </td>

                            <td>

                                @if($query->status === 'new')

                                    <span class="badge bg-primary">
                                        New
                                    </span>

                                @elseif($query->status === 'read')

                                    <span class="badge bg-info">
                                        Read
                                    </span>

                                @elseif($query->status === 'replied')

                                    <span class="badge bg-success">
                                        Replied
                                    </span>

                                @elseif($query->status === 'closed')

                                    <span class="badge bg-secondary">
                                        Closed
                                    </span>

                                @endif

                            </td>

                            <td>
                                {{ $query->created_at->format('d M Y, h:i A') }}
                            </td>

                            <td>

                                <a href="{{ route('admin.queries.show', $query) }}"
                                   class="btn btn-sm btn-primary">

                                    <i class="fa fa-eye"></i>

                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="8"
                                class="text-center py-4">

                                No queries found.

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>


            <div class="mt-3">

                {{ $queries->links() }}

            </div>

        </div>

    </div>

</div>

@endsection