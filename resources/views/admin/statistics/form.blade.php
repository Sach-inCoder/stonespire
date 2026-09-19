<div class="row">

    <div class="col-md-4 mb-3">

        <label class="form-label">Value *</label>

        <input type="text"
               name="value"
               class="form-control"
               value="{{ old('value', $statistic->value ?? '') }}"
               placeholder="16+"
               required>

    </div>


    <div class="col-md-5 mb-3">

        <label class="form-label">Label *</label>

        <input type="text"
               name="label"
               class="form-control"
               value="{{ old('label', $statistic->label ?? '') }}"
               placeholder="Years of Industry Experience"
               required>

    </div>


    <div class="col-md-3 mb-3">

        <label class="form-label">Icon</label>

        <input type="text"
               name="icon"
               class="form-control"
               value="{{ old('icon', $statistic->icon ?? '') }}"
               placeholder="fa-solid fa-award">

    </div>


    <div class="col-md-4 mb-3">

        <label class="form-label">Sort Order</label>

        <input type="number"
               name="sort_order"
               class="form-control"
               min="0"
               value="{{ old('sort_order', $statistic->sort_order ?? 0) }}">

    </div>


    <div class="col-md-12 mb-3">

        <div class="form-check form-switch">

            <input type="checkbox"
                   name="status"
                   value="1"
                   class="form-check-input"
                   @checked(old('status', $statistic->status ?? true))>

            <label class="form-check-label">
                Active
            </label>

        </div>

    </div>

</div>