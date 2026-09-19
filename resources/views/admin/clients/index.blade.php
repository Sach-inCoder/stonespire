@extends('admin.layouts.app')
@section('page-title', 'Clients')
@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between mb-4">

        <h4>Clients</h4>

        <a href="{{ route('admin.clients.create') }}"
           class="btn btn-primary">
            <i class="fa fa-plus"></i> Add client
        </a>

    </div>



    <div class="card">
        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered align-middle">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>LOGO</th>
                            <th>Name</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($clients as $client)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>
                                @if($client->logo)
                                    <img src="{{ asset($client->logo) }}"
                                         width="60"
                                         height="60"
                                         style="object-fit:cover;">
                                @endif
                            </td>

                            <td>{{ $client->name }}</td>


                            <td>{{ $client->sort_order }}</td>

                            <td>
                                @if($client->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>

                            <td>

                                <a href="{{ route('admin.clients.edit', $client) }}"
                                   class="btn btn-sm btn-warning">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form action="{{ route('admin.clients.destroy', $client) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Delete this client?')">

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
                                No clients found.
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