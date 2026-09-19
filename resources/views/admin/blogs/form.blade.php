@csrf

<div class="row">

    {{-- Title --}}
    <div class="col-md-8 mb-3">

        <label class="form-label">
            Blog Title <span class="text-danger">*</span>
        </label>

        <input type="text"
               name="title"
               id="blog_title"
               class="form-control @error('title') is-invalid @enderror"
               value="{{ old('title', $blog->title ?? '') }}"
               required>

        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>


    {{-- Sort Order --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">
            Sort Order
        </label>

        <input type="number"
               name="sort_order"
               class="form-control"
               value="{{ old('sort_order', $blog->sort_order ?? 0) }}"
               min="0">

    </div>


    {{-- Slug --}}
    <div class="col-md-12 mb-3">

        <label class="form-label">
            Slug
        </label>

        <input type="text"
               name="slug"
               id="blog_slug"
               class="form-control"
               value="{{ old('slug', $blog->slug ?? '') }}">

        <small class="text-muted">
            Leave blank to generate automatically.
        </small>

    </div>


    {{-- Category --}}
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Category / Tag
        </label>

        <input type="text"
               name="category"
               class="form-control"
               value="{{ old('category', $blog->category ?? '') }}"
               placeholder="e.g. Labels">

    </div>


    {{-- Author --}}
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Author
        </label>

        <input type="text"
               name="author"
               class="form-control"
               value="{{ old('author', $blog->author ?? 'Stonespire Graphics') }}">

    </div>


    {{-- Published Date --}}
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Published Date
        </label>

        <input type="date"
               name="published_at"
               class="form-control"
               value="{{ old(
                    'published_at',
                    isset($blog) && $blog->published_at
                        ? $blog->published_at->format('Y-m-d')
                        : ''
               ) }}">

    </div>


    {{-- Read Time --}}
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Read Time (Minutes)
        </label>

        <input type="number"
               name="read_time"
               class="form-control"
               value="{{ old('read_time', $blog->read_time ?? 4) }}"
               min="1"
               placeholder="4">

    </div>


    {{-- Image --}}
    <div class="col-md-8 mb-4">

        <label class="form-label">
            Blog Image
        </label>

        <input type="file"
               name="image"
               class="form-control @error('image') is-invalid @enderror"
               accept=".jpg,.jpeg,.png,.webp">

        <small class="text-muted">
            JPG, JPEG, PNG or WEBP. Maximum 10MB.
        </small>

        @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror


        @if(isset($blog) && $blog->image)

            <div class="mt-3">

                <img src="{{ asset($blog->image) }}"
                     alt="{{ $blog->title }}"
                     width="220"
                     height="140"
                     class="rounded border"
                     style="object-fit:cover;">

            </div>

        @endif

    </div>


    {{-- Short Description --}}
    <div class="col-md-12 mb-3">

        <label class="form-label">
            Short Description
        </label>

        <textarea name="short_description"
                  rows="4"
                  class="form-control">{{ old('short_description', $blog->short_description ?? '') }}</textarea>

    </div>


    {{-- Content --}}
    <div class="col-md-12 mb-4">

        <label class="form-label">
            Blog Content <span class="text-danger">*</span>
        </label>

        <textarea name="content"
                  id="blog_content"
                  rows="15"
                  class="form-control @error('content') is-invalid @enderror"
                  >{{ old('content', $blog->content ?? '') }}</textarea>

        @error('content')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>


    {{-- Quote --}}
    <div class="col-md-8 mb-3">

        <label class="form-label">
            Quote
        </label>

        <textarea name="quote"
                  rows="3"
                  class="form-control">{{ old('quote', $blog->quote ?? '') }}</textarea>

    </div>


    {{-- Quote Author --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">
            Quote Author / Label
        </label>

        <input type="text"
               name="quote_author"
               class="form-control"
               value="{{ old('quote_author', $blog->quote_author ?? '') }}">

    </div>


    {{-- Featured --}}
    <div class="col-md-6 mb-3">

        <div class="form-check form-switch">

            <input type="hidden"
                   name="featured"
                   value="0">

            <input type="checkbox"
                   name="featured"
                   value="1"
                   class="form-check-input"
                   id="featured"
                   @checked(old('featured', $blog->featured ?? false))>

            <label class="form-check-label"
                   for="featured">

                Featured Blog

            </label>

        </div>

    </div>


    {{-- Status --}}
    <div class="col-md-6 mb-3">

        <div class="form-check form-switch">

            <input type="hidden"
                   name="status"
                   value="0">

            <input type="checkbox"
                   name="status"
                   value="1"
                   class="form-check-input"
                   id="status"
                   @checked(old('status', $blog->status ?? true))>

            <label class="form-check-label"
                   for="status">

                Active

            </label>

        </div>

    </div>

</div>


<script>
    ClassicEditor
        .create(document.querySelector('#blog_content'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>

document.addEventListener('DOMContentLoaded', function () {

    const title = document.getElementById('blog_title');
    const slug = document.getElementById('blog_slug');

    if (!title || !slug) {
        return;
    }

    @if(!isset($blog))

    title.addEventListener('input', function () {

        slug.value = this.value
            .toLowerCase()
            .trim()
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/^-+|-+$/g, '');

    });

    @endif

});

</script>