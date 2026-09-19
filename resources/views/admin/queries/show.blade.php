@extends('admin.layouts.app')
@section('page-title', 'Query Details')
@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h4>
            Query Details
        </h4>

        <a href="{{ route('admin.queries') }}"
           class="btn btn-secondary">

            <i class="fa fa-arrow-left"></i>
            Back

        </a>

    </div>





    <div class="row">

        {{-- Query Details --}}
        <div class="col-lg-8">

            <div class="card">

                <div class="card-header">
                    <strong>Contact Information</strong>
                </div>

                <div class="card-body">

                    <div class="row mb-3">

                        <div class="col-md-4">
                            <strong>Name</strong>
                        </div>

                        <div class="col-md-8">
                            {{ $query->name }}
                        </div>

                    </div>


                    <div class="row mb-3">

                        <div class="col-md-4">
                            <strong>Email</strong>
                        </div>

                        <div class="col-md-8">

                            <a href="mailto:{{ $query->email }}">
                                {{ $query->email }}
                            </a>

                        </div>

                    </div>


                    <div class="row mb-3">

                        <div class="col-md-4">
                            <strong>Phone</strong>
                        </div>

                        <div class="col-md-8">

                            @if($query->phone)

                                <a href="tel:{{ $query->phone }}">
                                    {{ $query->phone }}
                                </a>

                            @else

                                -

                            @endif

                        </div>

                    </div>


                    <div class="row mb-3">

                        <div class="col-md-4">
                            <strong>Subject</strong>
                        </div>

                        <div class="col-md-8">
                            {{ $query->subject ?? '-' }}
                        </div>

                    </div>


                    <hr>


                    <div class="mb-2">
                        <strong>Message</strong>
                    </div>

                    <div class="bg-light p-3 rounded">

                        {!! nl2br(e($query->message)) !!}

                    </div>


                    <div class="mt-4">

                        <small class="text-muted">

                            Received:
                            {{ $query->created_at->format('d M Y, h:i A') }}

                        </small>

                    </div>

                </div>

            </div>

        </div>


        {{-- Status --}}
        <div class="col-lg-4">

            <div class="card">

                <div class="card-header">
                    <strong>Query Status</strong>
                </div>

                <div class="card-body">

                    <form
                        action="{{ route('admin.queries.status', $query) }}"
                        method="POST"
                    >

                        @csrf
                        @method('PUT')


                        <div class="mb-3">

                            <label class="form-label">
                                Status
                            </label>

                            <select name="status"
                                    class="form-select">

                                <option value="new"
                                    @selected($query->status === 'new')>
                                    New
                                </option>

                                <option value="read"
                                    @selected($query->status === 'read')>
                                    Read
                                </option>

                                <option value="replied"
                                    @selected($query->status === 'replied')>
                                    Replied
                                </option>

                                <option value="closed"
                                    @selected($query->status === 'closed')>
                                    Closed
                                </option>

                            </select>

                        </div>


                        <button type="submit"
                                class="btn btn-primary w-100">

                            Update Status

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection