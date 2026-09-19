<div class="row">

    <div class="col-md-6 mb-3">

        <label class="form-label">
            Facility Name *
        </label>

        <input type="text"
               name="name"
               class="form-control"
               value="{{ old('name', $qualityFacility->name ?? '') }}"
               required>

    </div>


    <div class="col-md-6 mb-3">

        <label class="form-label">
            Sort Order
        </label>

        <input type="number"
               name="sort_order"
               class="form-control"
               min="0"
               value="{{ old('sort_order', $qualityFacility->sort_order ?? 0) }}">

    </div>


    <div class="col-md-12 mb-3">

        <label class="form-label">
            Description
        </label>

        <textarea name="description"
                  rows="4"
                  class="form-control">{{ old('description', $qualityFacility->description ?? '') }}</textarea>

    </div>


    <div class="col-md-8 mb-3">

        <label class="form-label">
            Image
        </label>

        <input type="file"
               name="image"
               class="form-control"
               accept=".jpg,.jpeg,.png,.webp">

        @isset($quality)

            @if($qualityFacility->image)

                <img src="{{ asset($qualityFacility->image) }}"
                     width="180"
                     class="mt-2">

            @endif

        @endisset

    </div>


    <div class="col-md-12 mb-3">

        <div class="form-check form-switch">

            <input type="checkbox"
                   name="status"
                   value="1"
                   class="form-check-input"
                   @checked(old('status', $qualityFacility->status ?? true))>

            <label class="form-check-label">
                Active
            </label>

        </div>

    </div>

</div>