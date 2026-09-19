@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <h4 class="mb-4">Edit Testimonial</h4>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('admin.testimonials.update', $testimonial) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                @include('admin.testimonials.form')

                <button class="btn btn-primary">
                    Update Testimonial
                </button>

            </form>

        </div>
    </div>

</div>

@endsection