@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h4>
            Add Slider
        </h4>

        <a href="{{ route('admin.sliders.index') }}"
           class="btn btn-secondary">

            <i class="fa fa-arrow-left"></i>
            Back

        </a>

    </div>


    <div class="card">

        <div class="card-body">

            <form action="{{ route('admin.sliders.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                @include('admin.sliders.form')

                <button type="submit"
                        class="btn btn-primary">

                    Save Slider

                </button>

            </form>

        </div>

    </div>

</div>

@endsection