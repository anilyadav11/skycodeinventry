{{-- resources/views/regions/partials/form-fields.blade.php --}}
<!-- Area Input -->
<div class="form-group">
    <label for="area">Area</label>
    <input type="text" name="area" id="area" class="form-control" value="{{ $region->area ?? old('area') }}">
</div>

<!-- BZone Input -->
<div class="form-group">
    <label for="bzone">BZone</label>
    <input type="text" name="bzone" id="bzone" class="form-control"
        value="{{ $region->bzone ?? old('bzone') }}">
</div>

<!-- Latitude Input -->
<div class="form-group">
    <label for="lat">Latitude</label>
    <input type="text" name="lat" id="lat" class="form-control" value="{{ $region->lat ?? old('lat') }}">
</div>

<!-- Longitude Input -->
<div class="form-group">
    <label for="long">Longitude</label>
    <input type="text" name="long" id="long" class="form-control" value="{{ $region->long ?? old('long') }}">
</div>
