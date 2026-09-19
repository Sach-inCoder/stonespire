@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <h4 class="mb-4">Add client</h4>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('admin.clients.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                @include('admin.clients.form')

                <button class="btn btn-primary">
                    Save client
                </button>

            </form>

        </div>
    </div>

</div>

@endsection