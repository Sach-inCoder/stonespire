@extends('admin.layouts.app')

@section('title', 'Website Settings')

@section('page-title', 'Website Settings')

@section('content')

<form
    method="POST"
    action="{{ route('admin.settings.update') }}"
    enctype="multipart/form-data">

    @csrf


    {{-- General Settings --}}
    <div class="dashboard-card mb-4">

        <h5 class="mb-4">
            General Information
        </h5>

        <div class="row g-3">

            <div class="col-md-6">

                <label class="form-label">
                    Website Name
                </label>

                <input
                    type="text"
                    name="website_name"
                    class="form-control @error('website_name') is-invalid @enderror"
                    value="{{ old('website_name', $settings['website_name'] ?? '') }}"
                >

                @error('website_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <div class="col-md-6">

                <label class="form-label">
                    Phone
                </label>

                <input
                    type="text"
                    name="phone"
                    class="form-control"
                    value="{{ old('phone', $settings['phone'] ?? '') }}"
                >

            </div>


            <div class="col-md-6">

                <label class="form-label">
                    Alternate Phone
                </label>

                <input
                    type="text"
                    name="alternate_phone"
                    class="form-control"
                    value="{{ old('alternate_phone', $settings['alternate_phone'] ?? '') }}"
                >

            </div>


            <div class="col-md-6">

                <label class="form-label">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email', $settings['email'] ?? '') }}"
                >

            </div>


            <div class="col-md-6">

                <label class="form-label">
                    Alternate Email
                </label>

                <input
                    type="email"
                    name="alternate_email"
                    class="form-control"
                    value="{{ old('alternate_email', $settings['alternate_email'] ?? '') }}"
                >

            </div>


            <div class="col-md-6">

                <label class="form-label">
                    WhatsApp
                </label>

                <input
                    type="text"
                    name="whatsapp"
                    class="form-control"
                    value="{{ old('whatsapp', $settings['whatsapp'] ?? '') }}"
                >

            </div>


            <div class="col-12">

                <label class="form-label">
                    Address
                </label>

                <textarea
                    name="address"
                    rows="3"
                    class="form-control"
                >{{ old('address', $settings['address'] ?? '') }}</textarea>

            </div>
            <div class="col-12">

                <label class="form-label">
                    Google Map [paste google embaded code here]
                </label>

                <textarea
                    name="google_map"
                    rows="3"
                    class="form-control"
                >{{ old('google_map', $settings['google_map'] ?? '') }}</textarea>

            </div>

        </div>

    </div>


    {{-- Logo & Favicon --}}
    <div class="dashboard-card mb-4">

        <h5 class="mb-4">
            Logo & Favicon
        </h5>

        <div class="row g-4">

            <div class="col-md-6">

                <label class="form-label">
                    Website Logo
                </label>

                <input
                    type="file"
                    name="logo"
                    class="form-control @error('logo') is-invalid @enderror"
                    accept=".jpg,.jpeg,.png,.webp,.svg"
                >

                @error('logo')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror


                @if(!empty($settings['logo']))

                    <div class="mt-3">

                        <p class="text-muted mb-2">
                            Current Logo
                        </p>

                        <img
                            src="{{ asset('storage/' . $settings['logo']) }}"
                            alt="Logo"
                            style="max-width: 220px; max-height: 100px;"
                            class="img-thumbnail"
                        >

                    </div>

                @endif

            </div>


            <div class="col-md-6">

                <label class="form-label">
                    Favicon
                </label>

                <input
                    type="file"
                    name="favicon"
                    class="form-control @error('favicon') is-invalid @enderror"
                    accept=".jpg,.jpeg,.png,.ico,.webp"
                >

                @error('favicon')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror


                @if(!empty($settings['favicon']))

                    <div class="mt-3">

                        <p class="text-muted mb-2">
                            Current Favicon
                        </p>

                        <img
                            src="{{ asset('storage/' . $settings['favicon']) }}"
                            alt="Favicon"
                            style="width: 64px; height: 64px;"
                            class="img-thumbnail"
                        >

                    </div>

                @endif

            </div>

        </div>

    </div>


    {{-- Social Media --}}
    <div class="dashboard-card mb-4">

        <h5 class="mb-4">
            Social Media
        </h5>

        <div class="row g-3">

            <div class="col-md-6">

                <label class="form-label">
                    Facebook
                </label>

                <input
                    type="url"
                    name="facebook"
                    class="form-control"
                    placeholder="Facebook URL"
                    value="{{ old('facebook', $settings['facebook'] ?? '') }}"
                >

            </div>


            <div class="col-md-6">

                <label class="form-label">
                    Instagram
                </label>

                <input
                    type="url"
                    name="instagram"
                    class="form-control"
                    placeholder="Instagram URL"
                    value="{{ old('instagram', $settings['instagram'] ?? '') }}"
                >

            </div>


            <div class="col-md-6">

                <label class="form-label">
                    LinkedIn
                </label>

                <input
                    type="url"
                    name="linkedin"
                    class="form-control"
                    placeholder="LinkedIn URL"
                    value="{{ old('linkedin', $settings['linkedin'] ?? '') }}"
                >

            </div>


            <div class="col-md-6">

                <label class="form-label">
                    YouTube
                </label>

                <input
                    type="url"
                    name="youtube"
                    class="form-control"
                    placeholder="YouTube URL"
                    value="{{ old('youtube', $settings['youtube'] ?? '') }}"
                >

            </div>

        </div>

    </div>


    {{-- Footer --}}
    <div class="dashboard-card mb-4">

        <h5 class="mb-4">
            Footer
        </h5>

        <label class="form-label">
            Copyright Text
        </label>

        <input
            type="text"
            name="copyright"
            class="form-control"
            value="{{ old('copyright', $settings['copyright'] ?? '') }}"
            placeholder="© 2026 Stone Graphics. All Rights Reserved."
        >

    </div>


    <div class="text-end">

        <button
            type="submit"
            class="btn btn-primary px-4">

            Save Settings

        </button>

    </div>

</form>

@endsection