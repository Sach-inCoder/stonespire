@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <h4 class="mb-4">Edit qualities</h4>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('admin.quality-facilities.update', $qualityFacility) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                @include('admin.quality-facilities.form')

                <button class="btn btn-primary">
                    Update qualities
                </button>

            </form>

        </div>
    </div>

</div>

@endsection