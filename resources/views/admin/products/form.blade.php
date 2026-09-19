@csrf
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Product Information</h5>
    </div>
    <div class="card-body">
        <div class="row">

            {{-- Name --}}
            <div class="col-md-8 mb-3">

                <label class="form-label">
                    Product Name <span class="text-danger">*</span>
                </label>

                <input type="text"
                    name="name"
                    id="product_name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $product->name ?? '') }}"
                    placeholder="Enter product name"
                    required>

                @error('name')
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
                    class="form-control @error('sort_order') is-invalid @enderror"
                    value="{{ old('sort_order', $product->sort_order ?? 0) }}"
                    min="0">

                @error('sort_order')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

            </div>


            {{-- Slug --}}
            <div class="col-md-12 mb-3">

                <label class="form-label">
                    Slug
                </label>

                <input type="text"
                    name="slug"
                    id="product_slug"
                    class="form-control @error('slug') is-invalid @enderror"
                    value="{{ old('slug', $product->slug ?? '') }}"
                    placeholder="product-slug">

                <small class="text-muted">
                    Leave blank to automatically generate from product name.
                </small>

                @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

            </div>


            {{-- Image --}}
            <div class="col-md-8 mb-3">

                <label class="form-label">
                    Product Image
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

                @if(isset($product) && $product->image)

                <div class="mt-3">

                    <img src="{{ asset($product->image) }}"
                        alt="{{ $product->name }}"
                        width="150"
                        class="rounded border">

                </div>

                @endif

            </div>

            {{-- Short Description --}}
            <div class="col-md-12 mb-3">

                <label class="form-label">
                    Short Description
                </label>

                <textarea name="short_description"
                    rows="3"
                    class="form-control @error('short_description') is-invalid @enderror"
                    placeholder="Short product description">{{ old('short_description', $product->short_description ?? '') }}</textarea>

                @error('short_description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

            </div>


            {{-- Description --}}
            <div class="col-md-12 mb-3">

                <label class="form-label">
                    Description
                </label>

                <textarea name="description"
                    rows="7"
                    id="description"
                    class="form-control @error('description') is-invalid @enderror"
                    placeholder="Enter complete product description">{{ old('description', $product->description ?? '') }}</textarea>

                @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

            </div>
            {{-- final_content --}}
            <div class="col-md-12 mb-3">

                <label class="form-label">
                    Final Content
                </label>

                <textarea name="final_content"
                    rows="7"
                    id="final_content"
                    class="form-control @error('final_content') is-invalid @enderror"
                    placeholder="Enter complete product final content">{{ old('final_content', $product->final_content ?? '') }}</textarea>
                @error('final_content')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

            </div>


            {{-- WhatsApp Message --}}
            <div class="col-md-12 mb-3">

                <label class="form-label">
                    WhatsApp Message
                </label>

                <textarea name="whatsapp_message"
                    rows="3"
                    class="form-control @error('whatsapp_message') is-invalid @enderror"
                    placeholder="Message to use when contacting about this product">{{ old('whatsapp_message', $product->whatsapp_message ?? '') }}</textarea>

                @error('whatsapp_message')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

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
                        @checked(old('featured', $product->featured ?? false))>

                    <label class="form-check-label"
                        for="featured">
                        Featured Product
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
                        @checked(old('status', $product->status ?? true))>

                    <label class="form-check-label"
                        for="status">
                        Active
                    </label>

                </div>

            </div>
        </div>
    </div>
</div>
<div class="card my-3">
    <div class="card-header">
        <h5>Product Gallery</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 mt-3">
                {{-- Add Images --}}
                <div class="mb-4">
                    <label class="form-label">
                        Add Gallery Images
                    </label>
                    <input type="file"
                        name="gallery[]"
                        id="gallery"
                        class="form-control"
                        multiple
                        accept=".jpg,.jpeg,.png,.webp">
                    <small class="text-muted">
                        You can select multiple images. Maximum 2MB per image.
                    </small>
                </div>
                {{-- Existing Gallery --}}
                @if(isset($product) && $product->galleries->count())
                <div>
                    <label class="form-label">
                        Existing Images
                    </label>
                    <div id="gallery-container"
                        class="row g-3">
                        @foreach($product->galleries as $gallery)
                        <div class="col-lg-2 col-md-3 col-sm-4 gallery-item"
                            data-id="{{ $gallery->id }}">
                            <div class="card h-100">
                                <div class="position-relative">
                                    <img src="{{ asset($gallery->image) }}"
                                        class="card-img-top"
                                        style="height:140px;object-fit:cover;"
                                        alt="Gallery Image">
                                    <button type="button"
                                        class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1 delete-gallery"
                                        data-id="{{ $gallery->id }}"
                                        title="Delete image">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @else
                @if(isset($product))
                <div class="text-muted text-center py-4">
                    No gallery images added yet.
                </div>
                @endif
                @endif
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.6/Sortable.min.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#description'))
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#final_content'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>

document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | Slug
    |--------------------------------------------------------------------------
    */

    const nameInput = document.getElementById('product_name');
    const slugInput = document.getElementById('product_slug');

    if (nameInput && slugInput) {

        @if(!isset($product))

        nameInput.addEventListener('input', function () {

            slugInput.value = this.value
                .toLowerCase()
                .trim()
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/^-+|-+$/g, '');

        });

        @endif
    }


    /*
    |--------------------------------------------------------------------------
    | Gallery Sorting
    |--------------------------------------------------------------------------
    */

    const galleryContainer =
        document.getElementById('gallery-container');

    const hiddenFields =
        document.getElementById('gallery-hidden-fields');


    function updateGalleryOrder()
    {
        if (!galleryContainer || !hiddenFields) {
            return;
        }

        hiddenFields.innerHTML = '';

        const items =
            galleryContainer.querySelectorAll('.gallery-item');

        items.forEach(function (item, index) {

            const input =
                document.createElement('input');

            input.type = 'hidden';

            input.name = 'gallery_order[]';

            input.value =
                item.dataset.id;

            hiddenFields.appendChild(input);

        });
    }


    if (galleryContainer) {

        new Sortable(galleryContainer, {

            animation: 150,

            ghostClass: 'bg-light',

            onEnd: function () {
                updateGalleryOrder();
            }

        });

        updateGalleryOrder();
    }


    /*
    |--------------------------------------------------------------------------
    | Delete Gallery Image
    |--------------------------------------------------------------------------
    */

    document.querySelectorAll('.delete-gallery')
        .forEach(function (button) {

            button.addEventListener('click', function () {

                const galleryId =
                    this.dataset.id;

                if (!confirm(
                    'Are you sure you want to delete this gallery image?'
                )) {
                    return;
                }


                const form =
                    document.createElement('form');

                form.method = 'POST';

                form.action =
                    "{{ url('admin/product-gallery') }}/" +
                    galleryId;


                const csrf =
                    document.createElement('input');

                csrf.type = 'hidden';

                csrf.name = '_token';

                csrf.value =
                    "{{ csrf_token() }}";


                const method =
                    document.createElement('input');

                method.type = 'hidden';

                method.name = '_method';

                method.value = 'DELETE';


                form.appendChild(csrf);

                form.appendChild(method);

                document.body.appendChild(form);

                form.submit();

            });

        });

});

</script>