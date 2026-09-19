@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <h4 class="mb-4">Add Testimonial</h4>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('admin.testimonials.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                @include('admin.testimonials.form')

                <button class="btn btn-primary">
                    Save Testimonial
                </button>

            </form>

        </div>
    </div>

</div>

@endsection