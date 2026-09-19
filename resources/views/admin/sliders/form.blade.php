<div class="row">

    <div class="col-md-6 mb-3">

        <label class="form-label">
            Title
        </label>

        <input type="text"
               name="title"
               class="form-control"
               value="{{ old('title', $slider->title ?? '') }}">

    </div>


    <div class="col-md-6 mb-3">

        <label class="form-label">
            Subtitle
        </label>

        <input type="text"
               name="subtitle"
               class="form-control"
               value="{{ old('subtitle', $slider->subtitle ?? '') }}">

    </div>


    <div class="col-md-12 mb-3">

        <label class="form-label">
            Description
        </label>

        <textarea name="description"
                  rows="4"
                  class="form-control">{{ old('description', $slider->description ?? '') }}</textarea>

    </div>


    <div class="col-md-8 mb-3">

        <label class="form-label">
            Image
            @empty($slider)
                <span class="text-danger">*</span>
            @endempty
        </label>

        <input type="file"
               name="image"
               class="form-control"
               accept=".jpg,.jpeg,.png,.webp">

        @isset($slider)

            @if($slider->image)

                <div class="mt-2">

                    <img
                        src="{{ asset($slider->image) }}"
                        width="250"
                        height="120"
                        style="object-fit: cover;"
                    >

                </div>

            @endif

        @endisset

    </div>


    <div class="col-md-4 mb-3">

        <label class="form-label">
            Sort Order
        </label>

        <input type="number"
               name="sort_order"
               class="form-control"
               min="0"
               value="{{ old('sort_order', $slider->sort_order ?? 0) }}">

    </div>


    <div class="col-md-6 mb-3">

        <label class="form-label">
            Button Text
        </label>

        <input type="text"
               name="button_text"
               class="form-control"
               value="{{ old('button_text', $slider->button_text ?? '') }}"
               placeholder="Learn More">

    </div>


    <div class="col-md-6 mb-3">

        <label class="form-label">
            Button URL
        </label>

        <input type="text"
               name="button_url"
               class="form-control"
               value="{{ old('button_url', $slider->button_url ?? '') }}"
               placeholder="/contact">

    </div>


    <div class="col-md-12 mb-3">

        <div class="form-check form-switch">

            <input type="checkbox"
                   name="status"
                   value="1"
                   class="form-check-input"
                   @checked(old('status', $slider->status ?? true))>

            <label class="form-check-label">
                Active
            </label>

        </div>

    </div>

</div>