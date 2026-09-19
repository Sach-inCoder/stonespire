@extends('admin.layouts.app')
@section('page-title', 'Blogs')
@section('title', 'Blogs')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="mb-1">Blogs</h4>

            <p class="text-muted mb-0">
                Manage website blog posts
            </p>
        </div>

        <a href="{{ route('admin.blogs.create') }}"
           class="btn btn-primary">

            <i class="fas fa-plus"></i>
            Add Blog

        </a>

    </div>



    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>

                        <tr>

                            <th width="60">#</th>

                            <th width="100">Image</th>

                            <th>Title</th>

                            <th>Category</th>

                            <th>Author</th>

                            <th>Date</th>

                            <th>Featured</th>

                            <th>Status</th>

                            <th width="130">Action</th>

                        </tr>

                    </thead>


                    <tbody>

                    @forelse($blogs as $blog)

                        <tr>

                            <td>
                                {{ $blogs->firstItem() + $loop->index }}
                            </td>


                            <td>

                                @if($blog->image)

                                    <img src="{{ asset($blog->image) }}"
                                         alt="{{ $blog->title }}"
                                         width="80"
                                         height="55"
                                         class="rounded border"
                                         style="object-fit:cover;">

                                @else

                                    <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                         style="width:80px;height:55px;">

                                        <i class="fas fa-image text-muted"></i>

                                    </div>

                                @endif

                            </td>


                            <td>

                                <strong>
                                    {{ $blog->title }}
                                </strong>

                                @if($blog->short_description)

                                    <div class="small text-muted">
                                        {{ Str::limit($blog->short_description, 70) }}
                                    </div>

                                @endif

                            </td>


                            <td>

                                @if($blog->category)

                                    <span class="badge bg-info">
                                        {{ $blog->category }}
                                    </span>

                                @else

                                    <span class="text-muted">
                                        —
                                    </span>

                                @endif

                            </td>


                            <td>
                                {{ $blog->author }}
                            </td>


                            <td>

                                @if($blog->published_at)

                                    {{ $blog->published_at->format('M d, Y') }}

                                @else

                                    —

                                @endif

                            </td>


                            <td>

                                @if($blog->featured)

                                    <span class="badge bg-warning text-dark">
                                        Yes
                                    </span>

                                @else

                                    <span class="badge bg-secondary">
                                        No
                                    </span>

                                @endif

                            </td>


                            <td>

                                @if($blog->status)

                                    <span class="badge bg-success">
                                        Active
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        Inactive
                                    </span>

                                @endif

                            </td>


                            <td>

                                <div class="d-flex gap-1">

                                    <a href="{{ route('admin.blogs.edit', $blog) }}"
                                       class="btn btn-sm btn-outline-primary">

                                        <i class="fas fa-edit"></i>

                                    </a>


                                    <form action="{{ route('admin.blogs.destroy', $blog) }}"
                                          method="POST"
                                          onsubmit="return confirm('Delete this blog?');">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-sm btn-outline-danger">

                                            <i class="fas fa-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="9"
                                class="text-center py-5">

                                <i class="fas fa-newspaper fa-2x text-muted mb-3"></i>

                                <p class="text-muted mb-0">
                                    No blogs found.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>


            @if($blogs->hasPages())

                <div class="mt-3">
                    {{ $blogs->links() }}
                </div>

            @endif

        </div>

    </div>

</div>

@endsection