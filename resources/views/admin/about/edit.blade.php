@extends('admin.layouts.app')
@section('page-title', 'About Page Settings')
@section('content')

<div class="container-fluid">
    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1">About Page Settings</h4>

            <p class="text-muted mb-0">
                Manage your About Us page content
            </p>
        </div>
    </div>
    {{-- Errors --}}
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


    <form action="{{ route('admin.about.update') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        @method('PUT')



        <div class="card mb-4">

            <div class="card-header">
                <h5 class="mb-0">Page Banner</h5>
            </div>

            <div class="card-body">

                <label class="form-label">
                    Banner Title
                </label>

                <input type="text"
                       name="banner_title"
                       class="form-control"
                       value="{{ old('banner_title', $aboutPage->banner_title) }}">

            </div>

        </div>


        <div class="card mb-4">

            <div class="card-header">
                <h5 class="mb-0">About Section</h5>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Small Label
                        </label>

                        <input type="text"
                               name="about_label"
                               class="form-control"
                               value="{{ old('about_label', $aboutPage->about_label) }}">

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Tagline
                        </label>

                        <input type="text"
                               name="about_tagline"
                               class="form-control"
                               value="{{ old('about_tagline', $aboutPage->about_tagline) }}">

                    </div>


                    <div class="col-12 mb-3">

                        <label class="form-label">
                            Title
                        </label>

                        <input type="text"
                               name="about_title"
                               class="form-control"
                               value="{{ old('about_title', $aboutPage->about_title) }}">

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Description
                        </label>

                        <textarea name="about_description"
                                  rows="6"
                                  class="form-control">{{ old('about_description', $aboutPage->about_description) }}</textarea>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Description 2
                        </label>

                        <textarea name="about_description_2"
                                  rows="6"
                                  class="form-control">{{ old('about_description_2', $aboutPage->about_description_2) }}</textarea>

                    </div>


                    {{-- About Image --}}

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            About Image
                        </label>

                        <input type="file"
                               name="about_image"
                               class="form-control @error('about_image') is-invalid @enderror"
                               accept=".jpg,.jpeg,.png,.webp">

                        @error('about_image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror


                        @if($aboutPage->about_image)

                            <div class="mt-3">

                                <img src="{{ asset($aboutPage->about_image) }}"
                                     alt="About Image"
                                     class="img-thumbnail"
                                     style="width: 180px; height: 120px; object-fit: cover;">

                            </div>

                        @endif

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Button Text
                        </label>

                        <input type="text"
                               name="about_button_text"
                               class="form-control"
                               value="{{ old('about_button_text', $aboutPage->about_button_text) }}">

                    </div>

                </div>

            </div>

        </div>



        <div class="card mb-4">

            <div class="card-header">
                <h5 class="mb-0">Printing Technologies Section</h5>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Label
                        </label>

                        <input type="text"
                               name="technology_label"
                               class="form-control"
                               value="{{ old('technology_label', $aboutPage->technology_label) }}">

                    </div>


                    <div class="col-md-8 mb-3">

                        <label class="form-label">
                            Title
                        </label>

                        <input type="text"
                               name="technology_title"
                               class="form-control"
                               value="{{ old('technology_title', $aboutPage->technology_title) }}">

                    </div>


                    <div class="col-12">

                        <label class="form-label">
                            Description
                        </label>

                        <textarea name="technology_description"
                                  rows="4"
                                  class="form-control">{{ old('technology_description', $aboutPage->technology_description) }}</textarea>

                    </div>

                </div>

            </div>

        </div>



        <div class="card mb-4">

            <div class="card-header">
                <h5 class="mb-0">Vision / Values / Mission</h5>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Section Label
                        </label>

                        <input type="text"
                               name="vm_label"
                               class="form-control"
                               value="{{ old('vm_label', $aboutPage->vm_label) }}">

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Section Title
                        </label>

                        <input type="text"
                               name="vm_title"
                               class="form-control"
                               value="{{ old('vm_title', $aboutPage->vm_title) }}">

                    </div>


                    {{-- Vision --}}

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Vision Title
                        </label>

                        <input type="text"
                               name="vision_title"
                               class="form-control"
                               value="{{ old('vision_title', $aboutPage->vision_title) }}">

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Vision Description
                        </label>

                        <textarea name="vision_description"
                                  rows="4"
                                  class="form-control">{{ old('vision_description', $aboutPage->vision_description) }}</textarea>

                    </div>


                    {{-- Values --}}

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Values Title
                        </label>

                        <input type="text"
                               name="values_title"
                               class="form-control"
                               value="{{ old('values_title', $aboutPage->values_title) }}">

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Values Description
                        </label>

                        <textarea name="values_description"
                                  rows="4"
                                  class="form-control">{{ old('values_description', $aboutPage->values_description) }}</textarea>

                    </div>


                    {{-- Mission --}}

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Mission Title
                        </label>

                        <input type="text"
                               name="mission_title"
                               class="form-control"
                               value="{{ old('mission_title', $aboutPage->mission_title) }}">

                    </div>

                </div>

            </div>

        </div>



        <div class="card mb-4">

            <div class="card-header">
                <h5 class="mb-0">Quality & Innovation</h5>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Label
                        </label>

                        <input type="text"
                               name="quality_label"
                               class="form-control"
                               value="{{ old('quality_label', $aboutPage->quality_label) }}">

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Title
                        </label>

                        <input type="text"
                               name="quality_title"
                               class="form-control"
                               value="{{ old('quality_title', $aboutPage->quality_title) }}">

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Description
                        </label>

                        <textarea name="quality_description"
                                  rows="5"
                                  class="form-control">{{ old('quality_description', $aboutPage->quality_description) }}</textarea>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Description 2
                        </label>

                        <textarea name="quality_description_2"
                                  rows="5"
                                  class="form-control">{{ old('quality_description_2', $aboutPage->quality_description_2) }}</textarea>

                    </div>


                    {{-- Quality Image --}}

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Quality Image
                        </label>

                        <input type="file"
                               name="quality_image"
                               class="form-control @error('quality_image') is-invalid @enderror"
                               accept=".jpg,.jpeg,.png,.webp">

                        @error('quality_image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror


                        @if($aboutPage->quality_image)

                            <div class="mt-3">

                                <img src="{{ asset($aboutPage->quality_image) }}"
                                     alt="Quality Image"
                                     class="img-thumbnail"
                                     style="width: 180px; height: 120px; object-fit: cover;">

                            </div>

                        @endif

                    </div>

                </div>

            </div>

        </div>



        <div class="card mb-4">

            <div class="card-header">
                <h5 class="mb-0">CTA Section</h5>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Title
                        </label>

                        <input type="text"
                               name="cta_title"
                               class="form-control"
                               value="{{ old('cta_title', $aboutPage->cta_title) }}">

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Button Text
                        </label>

                        <input type="text"
                               name="cta_button_text"
                               class="form-control"
                               value="{{ old('cta_button_text', $aboutPage->cta_button_text) }}">

                    </div>


                    <div class="col-12">

                        <label class="form-label">
                            Description
                        </label>

                        <textarea name="cta_description"
                                  rows="4"
                                  class="form-control">{{ old('cta_description', $aboutPage->cta_description) }}</textarea>

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