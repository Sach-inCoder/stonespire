@extends('admin.layouts.app')

@section('title', 'Add Blog')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="mb-1">Add Blog</h4>
            <p class="text-muted mb-0">
                Create a new blog post
            </p>
        </div>

        <a href="{{ route('admin.blogs.index') }}"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>
            Back

        </a>

    </div>


    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <form action="{{ route('admin.blogs.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @include('admin.blogs.form')

                <div class="mt-4">

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="fas fa-save"></i>
                        Save Blog

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