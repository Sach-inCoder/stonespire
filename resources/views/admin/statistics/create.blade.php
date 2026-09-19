@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <h4 class="mb-4">Add statistic</h4>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('admin.statistics.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                @include('admin.statistics.form')

                <button class="btn btn-primary">
                    Save statistic
                </button>

            </form>

        </div>
    </div>

</div>

@endsection