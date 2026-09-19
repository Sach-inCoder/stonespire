@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h4>Edit Service</h4>

        <a href="{{ route('admin.services.index') }}"
           class="btn btn-secondary">
            Back
        </a>

    </div>


    <form action="{{ route('admin.services.update', $service) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        @include('admin.services.form')

        <button type="submit" class="btn btn-primary">
            <i class="fa fa-save"></i>
            Update Service
        </button>

    </form>

</div>

@endsection