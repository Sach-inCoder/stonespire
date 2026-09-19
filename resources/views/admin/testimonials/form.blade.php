<div class="row">

    <div class="col-md-6 mb-3">
        <label class="form-label">Name *</label>

        <input type="text"
               name="name"
               class="form-control"
               value="{{ old('name', $testimonial->name ?? '') }}"
               required>
    </div>


    <div class="col-md-6 mb-3">
        <label class="form-label">Designation</label>

        <input type="text"
               name="designation"
               class="form-control"
               value="{{ old('designation', $testimonial->designation ?? '') }}">
    </div>


    <div class="col-md-8 mb-3">
        <label class="form-label">Message *</label>

        <textarea name="message"
                  rows="5"
                  class="form-control"
                  required>{{ old('message', $testimonial->message ?? '') }}</textarea>
    </div>


    <div class="col-md-4 mb-3">

        <label class="form-label">Rating *</label>

        <select name="rating"
                class="form-select">

            @for($i = 1; $i <= 5; $i++)

                <option value="{{ $i }}"
                    @selected(old('rating', $testimonial->rating ?? 5) == $i)>
                    {{ $i }} Star
                </option>

            @endfor

        </select>

    </div>


    <div class="col-md-8 mb-3">

        <label class="form-label">Image</label>

        <input type="file"
               name="image"
               class="form-control"
               accept=".jpg,.jpeg,.png,.webp">

        @isset($testimonial)

            @if($testimonial->image)

                <img src="{{ asset($testimonial->image) }}"
                     width="100"
                     class="mt-2">

            @endif

        @endisset

    </div>


    <div class="col-md-4 mb-3">

        <label class="form-label">Sort Order</label>

        <input type="number"
               name="sort_order"
               class="form-control"
               min="0"
               value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}">

    </div>


    <div class="col-md-12 mb-3">

        <div class="form-check form-switch">

            <input type="checkbox"
                   name="status"
                   value="1"
                   class="form-check-input"
                   @checked(old('status', $testimonial->status ?? true))>

            <label class="form-check-label">
                Active
            </label>

        </div>

    </div>

</div>