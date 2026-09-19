@extends('admin.layouts.app')

@section('title', 'Edit Blog')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="mb-1">Edit Blog</h4>

            <p class="text-muted mb-0">
                Update {{ $blog->title }}
            </p>
        </div>

        <a href="{{ route('admin.blogs.index') }}"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>
            Back

        </a>

    </div>


    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <form action="{{ route('admin.blogs.update', $blog) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @method('PUT')

                @include('admin.blogs.form')

                <div class="mt-4">

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="fas fa-save"></i>
                        Update Blog

                    </button>

                    <a href="{{ route('admin.blogs.index') }}"
                       class="btn btn-light">

                        Cancel

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection