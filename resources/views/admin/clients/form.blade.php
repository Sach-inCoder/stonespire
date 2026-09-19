<div class="row">

    <div class="col-md-6 mb-3">

        <label class="form-label">
            Client Name *
        </label>

        <input type="text"
               name="name"
               class="form-control"
               value="{{ old('name', $client->name ?? '') }}"
               required>

    </div>


    <div class="col-md-6 mb-3">

        <label class="form-label">
            Website
        </label>

        <input type="url"
               name="website"
               class="form-control"
               value="{{ old('website', $client->website ?? '') }}"
               placeholder="https://example.com">

    </div>


    <div class="col-md-8 mb-3">

        <label class="form-label">
            Logo
        </label>

        <input type="file"
               name="logo"
               class="form-control"
               accept=".jpg,.jpeg,.png,.webp">

        @isset($client)

            @if($client->logo)

                <img src="{{ asset($client->logo) }}"
                     width="150"
                     class="mt-2">

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
               value="{{ old('sort_order', $client->sort_order ?? 0) }}">

    </div>


    <div class="col-md-12 mb-3">

        <div class="form-check form-switch">

            <input type="checkbox"
                   name="status"
                   value="1"
                   class="form-check-input"
                   @checked(old('status', $client->status ?? true))>

            <label class="form-check-label">
                Active
            </label>

        </div>

    </div>

</div>