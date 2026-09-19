@extends('admin.layouts.app')
@section('page-title', 'Home Page Settings')
@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1">Homepage Settings</h4>
            <p class="text-muted mb-0">
                Manage homepage content
            </p>
        </div>
    </div>


    @if($errors->any())
    <div class="alert alert-danger">
        <strong>Please fix the following errors:</strong>

        <ul class="mb-0 mt-2">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.home.update') }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf
        @method('PUT')

        {{-- ABOUT SECTION --}}
        <div class="card mb-4">

            <div class="card-header">
                <h5 class="mb-0">About Section</h5>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Label
                        </label>

                        <input type="text"
                            name="about_label"
                            class="form-control"
                            value="{{ old('about_label', $homePage->about_label) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Experience
                        </label>

                        <input type="text"
                            name="about_experience"
                            class="form-control"
                            value="{{ old('about_experience', $homePage->about_experience) }}">
                    </div>

                    <div class="col-12 mb-3">
                        <label class="form-label">
                            Title
                        </label>

                        <input type="text"
                            name="about_title"
                            class="form-control"
                            value="{{ old('about_title', $homePage->about_title) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Description
                        </label>

                        <textarea name="about_description"
                            rows="6"
                            class="form-control">{{ old('about_description', $homePage->about_description) }}</textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Description 2
                        </label>

                        <textarea name="about_description_2"
                            rows="6"
                            class="form-control">{{ old('about_description_2', $homePage->about_description_2) }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">
                            Button Text
                        </label>

                        <input type="text"
                            name="about_button_text"
                            class="form-control"
                            value="{{ old('about_button_text', $homePage->about_button_text) }}">
                    </div>
                    <div class="col-md-6">
                        
                        <label class="form-label">
                            About Image
                        </label>

                        <input
                            type="file"
                            name="about_image"
                            class="form-control @error('about_image') is-invalid @enderror"
                            accept=".jpg,.jpeg,.png,.webp,.svg">
                        <p>
                            <i class="text-muted">Image size should be less than 2MB</i>
                        </p>
                        @error('about_image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror


                        @if(!empty($homePage->about_image))

                        <div class="mt-3">

                            <p class="text-muted mb-2">
                                Current Image
                            </p>

                            <img
                                src="../{{ $homePage->about_image }}"
                                alt="about_image"
                                style="max-width: 220px; max-height: 100px;"
                                class="img-thumbnail">

                        </div>

                        @endif

                    </div>

                </div>

            </div>
        </div>


        {{-- QUOTE SECTION --}}
        <div class="card mb-4">

            <div class="card-header">
                <h5 class="mb-0">Quote / CTA Section</h5>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-8 mb-3">
                        <label class="form-label">
                            Title
                        </label>

                        <input type="text"
                            name="quote_title"
                            class="form-control"
                            value="{{ old('quote_title', $homePage->quote_title) }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            Button Text
                        </label>

                        <input type="text"
                            name="quote_button_text"
                            class="form-control"
                            value="{{ old('quote_button_text', $homePage->quote_button_text) }}">
                    </div>

                </div>

            </div>
        </div>


        {{-- SOLUTIONS SECTION --}}
        <div class="card mb-4">

            <div class="card-header">
                <h5 class="mb-0">Printing Solutions</h5>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Subtitle
                        </label>

                        <input type="text"
                            name="solutions_subtitle"
                            class="form-control"
                            value="{{ old('solutions_subtitle', $homePage->solutions_subtitle) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Title
                        </label>

                        <input type="text"
                            name="solutions_title"
                            class="form-control"
                            value="{{ old('solutions_title', $homePage->solutions_title) }}">
                    </div>

                </div>

            </div>
        </div>


        {{-- PRODUCTS SECTION --}}
        <div class="card mb-4">

            <div class="card-header">
                <h5 class="mb-0">Product Range Section</h5>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            Label
                        </label>

                        <input type="text"
                            name="products_label"
                            class="form-control"
                            value="{{ old('products_label', $homePage->products_label) }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            Title
                        </label>

                        <input type="text"
                            name="products_title"
                            class="form-control"
                            value="{{ old('products_title', $homePage->products_title) }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            Description
                        </label>

                        <textarea name="products_description"
                            rows="3"
                            class="form-control">{{ old('products_description', $homePage->products_description) }}</textarea>
                    </div>

                </div>

            </div>
        </div>


        {{-- LOCATION SECTION --}}
        <div class="card mb-4">

            <div class="card-header">
                <h5 class="mb-0">Location Section</h5>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Title
                        </label>

                        <input type="text"
                            name="location_title"
                            class="form-control"
                            value="{{ old('location_title', $homePage->location_title) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Location Name
                        </label>

                        <input type="text"
                            name="location_name"
                            class="form-control"
                            value="{{ old('location_name', $homePage->location_name) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Label
                        </label>

                        <input type="text"
                            name="location_label"
                            class="form-control"
                            value="{{ old('location_label', $homePage->location_label) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Description
                        </label>

                        <textarea name="location_description"
                            rows="3"
                            class="form-control">{{ old('location_description', $homePage->location_description) }}</textarea>
                    </div>
                    <div class="col-md-6">

                        <label class="form-label">
                            Location Map
                        </label>

                        <input
                            type="file"
                            name="location_map"
                            class="form-control @error('location_map') is-invalid @enderror"
                            accept=".jpg,.jpeg,.png,.webp,.svg">
                        <p>
                            <i class="text-muted">Image size should be less than 2MB</i>
                        </p>
                        @error('location_map')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror


                        @if(!empty($homePage->location_map))

                        <div class="mt-3">

                            <p class="text-muted mb-2">
                                Current Image
                            </p>

                            <img
                                src="{{ asset('../' . $homePage->location_map) }}"
                                alt="Logo"
                                style="max-width: 220px; max-height: 100px;"
                                class="img-thumbnail">

                        </div>

                        @endif

                    </div>

                </div>

            </div>
        </div>


        {{-- TESTIMONIAL SECTION --}}
        <div class="card mb-4">

            <div class="card-header">
                <h5 class="mb-0">Testimonials Section</h5>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Title
                        </label>

                        <input type="text"
                            name="testimonials_title"
                            class="form-control"
                            value="{{ old('testimonials_title', $homePage->testimonials_title) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Description
                        </label>

                        <textarea name="testimonials_description"
                            rows="3"
                            class="form-control">{{ old('testimonials_description', $homePage->testimonials_description) }}</textarea>
                    </div>

                </div>

            </div>
        </div>


        {{-- CLIENTS SECTION --}}
        <div class="card mb-4">

            <div class="card-header">
                <h5 class="mb-0">Clients Section</h5>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Label
                        </label>

                        <input type="text"
                            name="clients_label"
                            class="form-control"
                            value="{{ old('clients_label', $homePage->clients_label) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Title
                        </label>

                        <input type="text"
                            name="clients_title"
                            class="form-control"
                            value="{{ old('clients_title', $homePage->clients_title) }}">
                    </div>

                </div>

            </div>
        </div>


        {{-- QUALITY LAB --}}
        <div class="card mb-4">

            <div class="card-header">
                <h5 class="mb-0">Quality Lab Section</h5>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Title
                        </label>

                        <input type="text"
                            name="quality_title"
                            class="form-control"
                            value="{{ old('quality_title', $homePage->quality_title) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Subtitle
                        </label>

                        <input type="text"
                            name="quality_subtitle"
                            class="form-control"
                            value="{{ old('quality_subtitle', $homePage->quality_subtitle) }}">
                    </div>
                    <div class="col-md-6">

                        <label class="form-label">
                            Quality Lab Image
                        </label>

                        <input
                            type="file"
                            name="quality_image"
                            class="form-control @error('quality_image') is-invalid @enderror"
                            accept=".jpg,.jpeg,.png,.webp,.svg">
                        <p>
                            <i class="text-muted">Image size should be less than 2MB</i>
                        </p>
                        @error('quality_image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror


                        @if(!empty($homePage->quality_image))

                        <div class="mt-3">

                            <p class="text-muted mb-2">
                                Current Image
                            </p>

                            <img
                                src="{{ asset('../' . $homePage->quality_image) }}"
                                alt="Logo"
                                style="max-width: 220px; max-height: 100px;"
                                class="img-thumbnail">

                        </div>

                        @endif

                    </div>

                </div>

            </div>
        </div>


        {{-- SAVE --}}
        <div class="text-end mb-5">

            <button type="submit"
                class="btn btn-primary px-5">

                <i class="fa-solid fa-save me-1"></i>

                Save Changes

            </button>

        </div>

    </form>

</div>

@endsection