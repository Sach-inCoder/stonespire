@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <h4 class="mb-4">Edit statistic</h4>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('admin.statistics.update', $statistic) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                @include('admin.statistics.form')

                <button class="btn btn-primary">
                    Update statistic
                </button>

            </form>

        </div>
    </div>

</div>

@endsection