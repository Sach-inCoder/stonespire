@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <h4 class="mb-4">Add qualities</h4>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('admin.quality-facilities.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                @include('admin.quality-facilities.form')

                <button class="btn btn-primary">
                    Save qualities
                </button>

            </form>

        </div>
    </div>

</div>

@endsection