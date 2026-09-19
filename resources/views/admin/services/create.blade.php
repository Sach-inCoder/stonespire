@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>Add Service</h4>

        <a href="{{ route('admin.services.index') }}"
           class="btn btn-secondary">
            Back
        </a>
    </div>


    <form action="{{ route('admin.services.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        @include('admin.services.form')

        <button type="submit" class="btn btn-primary">
            <i class="fa fa-save"></i>
            Save Service
        </button>

    </form>

</div>

@endsection