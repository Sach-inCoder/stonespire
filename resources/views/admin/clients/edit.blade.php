@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <h4 class="mb-4">Edit client</h4>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('admin.clients.update', $client) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                @include('admin.clients.form')

                <button class="btn btn-primary">
                    Update client
                </button>

            </form>

        </div>
    </div>

</div>

@endsection