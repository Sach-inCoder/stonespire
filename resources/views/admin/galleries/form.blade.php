<div class="row">

    {{-- Title --}}
    <div class="col-md-8 mb-3">

        <label class="form-label">
            Title <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            name="title"
            class="form-control @error('title') is-invalid @enderror"
            value="{{ old('title', $gallery->title ?? '') }}"
            placeholder="Enter gallery title"
        >

        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>


    {{-- Category --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">
            Category <span class="text-danger">*</span>
        </label>

        <select
            name="category"
            class="form-select @error('category') is-invalid @enderror"
        >

            <option value="">Select Category</option>

            <option value="printing"
                @selected(old('category', $gallery->category ?? '') == 'printing')>
                Printing
            </option>

            <option value="labels"
                @selected(old('category', $gallery->category ?? '') == 'labels')>
                Labels
            </option>

            <option value="industrial"
                @selected(old('category', $gallery->category ?? '') == 'industrial')>
                Industrial
            </option>

            <option value="products"
                @selected(old('category', $gallery->category ?? '') == 'products')>
                Products
            </option>

        </select>

        @error('category')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>


    {{-- Image --}}
    <div class="col-md-8 mb-3">

        <label class="form-label">
            Image
            @empty($gallery)
                <span class="text-danger">*</span>
            @endempty
        </label>

        <input
            type="file"
            name="image"
            class="form-control @error('image') is-invalid @enderror"
            accept=".jpg,.jpeg,.png,.webp"
        >

        @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror


        @isset($gallery)

            @if($gallery->image)

                <div class="mt-3">

                    <img
                        src="{{ asset($gallery->image) }}"
                        width="180"
                        height="120"
                        style="object-fit:cover;"
                    >

                </div>

            @endif

        @endisset

    </div>


    {{-- Sort Order --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">
            Sort Order
        </label>

        <input
            type="number"
            name="sort_order"
            class="form-control"
            value="{{ old('sort_order', $gallery->sort_order ?? 0) }}"
            min="0"
        >

    </div>


    {{-- Status --}}
    <div class="col-md-12 mb-3">

        <div class="form-check form-switch">

            <input
                type="checkbox"
                name="status"
                value="1"
                class="form-check-input"
                id="status"
                @checked(old('status', $gallery->status ?? true))
            >

            <label class="form-check-label"
                   for="status">

                Active

            </label>

        </div>

    </div>

</div>