<div class="mb-3">
    <label>Title</label>
    <input type="text" name="scheme_title" class="form-control" value="{{ old('scheme_title', $scheme->scheme_title ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control" rows="3" required>{{ old('description', $scheme->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label>Image</label>
    <input type="file" name="image" class="form-control">
    @if (!empty($scheme->image))
        <img src="{{ asset('storage/' . $scheme->image) }}" width="80" class="mt-2">
    @endif
</div>

<div class="mb-3">
    <label>Applying Fee (₹)</label>
    <input type="number" step="0.01" name="applying_fee" class="form-control" value="{{ old('applying_fee', $scheme->applying_fee ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Last Date</label>
    <input type="date" name="last_date" class="form-control" value="{{ old('last_date', $scheme->last_date ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-control">
        <option value="active" {{ (old('status', $scheme->status ?? '') == 'active') ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ (old('status', $scheme->status ?? '') == 'inactive') ? 'selected' : '' }}>Inactive</option>
    </select>
</div>

<div class="mb-3">
    <label>URL</label>
    <input type="url" name="url" class="form-control" value="{{ old('url', $schemes->url ?? '') }}">
</div>
