<div class="card mb-4">

    <div class="card-header">
        <h5 class="mb-0">Service Information</h5>
    </div>

    <div class="card-body">

        <div class="row g-3">

            {{-- name --}}
            <div class="col-md-10">
                <label class="form-label">
                    Service name <span class="text-danger">*</span>
                </label>

                <input type="text"
                       name="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name', $service->name ?? '') }}">

                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- Status --}}
            <div class="col-md-2">

                <label class="form-label d-block">
                    Status
                </label>
                <div class="form-check form-switch mt-2">
                    <input type="hidden" name="status" value="0">
                    <input class="form-check-input"
                           type="checkbox"
                           name="status"
                           value="1"
                           id="status"
                           {{ old('status', $service->status ?? 1) ? 'checked' : '' }}>
                    <label class="form-check-label" for="status">
                        Active
                    </label>
                </div>

            </div>

            {{-- Description --}}
            <div class="col-12">

                <label class="form-label">
                    Short Description <span class="text-danger">*</span>
                </label>

                <textarea name="short_description"
                          rows="3"
                          class="form-control @error('short_description') is-invalid @enderror">{{ old('short_description', $service->short_description ?? '') }}</textarea>

                @error('short_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>
            {{-- Description --}}
            <div class="col-12">

                <label class="form-label">
                    Description <span class="text-danger">*</span>
                </label>

                <textarea name="description"
                          rows="5"
                          class="form-control @error('description') is-invalid @enderror">{{ old('description', $service->description ?? '') }}</textarea>

                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>


            {{-- Icon --}}
            <div class="col-md-6">

                <label class="form-label">
                    Font Awesome Icon
                </label>

                <input type="text"
                       name="icon"
                       class="form-control"
                       placeholder="fa-solid fa-print"
                       value="{{ old('icon', $service->icon ?? '') }}">

                <small class="text-muted">
                    Example: fa-solid fa-print
                </small>

            </div>


            {{-- Sort Order --}}
            <div class="col-md-3">

                <label class="form-label">
                    Sort Order
                </label>

                <input type="number"
                       name="sort_order"
                       class="form-control"
                       min="0"
                       value="{{ old('sort_order', $service->sort_order ?? 0) }}">

            </div>


            


            {{-- Image --}}
            <div class="col-md-6">

                <label class="form-label">
                    Service Image
                    @if(!isset($service))
                        <span class="text-danger">*</span>
                    @endif
                </label>

                <input type="file"
                       name="image"
                       class="form-control @error('image') is-invalid @enderror"
                       accept=".jpg,.jpeg,.png,.webp">

                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                @if(isset($service) && $service->image)
                    <div class="mt-3">
                        <img src="{{ asset($service->image) }}"
                             width="180"
                             height="120"
                             style="object-fit:cover;border-radius:8px;">
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
{{-- Tags --}}
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">
            Service Tags
        </h5>
        <button type="button"
                class="btn btn-sm btn-primary"
                id="addTag">
            <i class="fa fa-plus"></i>
            Add Tag
        </button>
    </div>
    <div class="card-body">
        <div id="tagsWrapper">
            @if(isset($service) && $service->tags->count())
                @foreach($service->tags as $tag)
                    <div class="input-group mb-2 tag-row">
                        <input type="text"
                               name="tags[]"
                               class="form-control"
                               value="{{ old('tags.' . $loop->index, $tag->name) }}"
                               placeholder="e.g. MULTI-COLOR">
                        <button type="button"
                                class="btn btn-danger remove-tag">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                @endforeach
            @else
                <div class="input-group mb-2 tag-row">
                    <input type="text"
                           name="tags[]"
                           class="form-control"
                           placeholder="e.g. MULTI-COLOR">
                    <button type="button"
                            class="btn btn-danger remove-tag">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>
<script>

document.getElementById('addTag').addEventListener('click', function () {

    const wrapper = document.getElementById('tagsWrapper');

    const row = document.createElement('div');

    row.className = 'input-group mb-2 tag-row';

    row.innerHTML = `
        <input type="text"
               name="tags[]"
               class="form-control"
               placeholder="e.g. MULTI-COLOR">

        <button type="button"
                class="btn btn-danger remove-tag">
            <i class="fa fa-trash"></i>
        </button>
    `;

    wrapper.appendChild(row);
});


document.addEventListener('click', function (e) {

    if (e.target.closest('.remove-tag')) {

        const rows = document.querySelectorAll('.tag-row');

        if (rows.length > 1) {
            e.target.closest('.tag-row').remove();
        }

    }

});

</script>