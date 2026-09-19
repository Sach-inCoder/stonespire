@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h4>Edit product</h4>

        <a href="{{ route('admin.products.index') }}"
           class="btn btn-secondary">
            Back
        </a>

    </div>


    <form action="{{ route('admin.products.update', $product) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        @include('admin.products.form')

        <button type="submit" class="btn btn-primary">
            <i class="fa fa-save"></i>
            Update product
        </button>

    </form>

</div>

@endsection