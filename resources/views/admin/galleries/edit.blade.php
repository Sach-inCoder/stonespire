@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h4>
            Edit Gallery
        </h4>

        <a href="{{ route('admin.galleries.index') }}"
           class="btn btn-secondary">

            Back

        </a>

    </div>


    <div class="card">

        <div class="card-body">

            <form
                action="{{ route('admin.galleries.update', $gallery) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')

                @include('admin.galleries.form')

                <button type="submit"
                        class="btn btn-primary">

                    Update Gallery

                </button>

            </form>

        </div>

    </div>

</div>

@endsection