@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Edit Beat</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('beats.update', $beat->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="region_zone_id">Zone</label>
                <select name="region_zone_id" id="region_zone_id" class="form-control">
                    <option value="{{ $beat->region_zone_id }}" selected>{{ $beat->region_zone_id }}</option>
                    @foreach ($regions as $region)
                        <option value="{{ $region->region_zone }}">{{ $region->region_zone }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="state_id">State</label>
                <select name="state_id" id="state_id" class="form-control">
                    @foreach ($regions as $region)
                        @if ($region->region_zone == $beat->region_zone_id)
                            <option value="{{ $region->state_id }}" selected>{{ $region->state_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="district_id">City</label>
                <select name="district_id" id="district_id" class="form-control">
                    <!-- Populate cities based on selected state -->
                </select>
            </div>

            <div class="form-group">
                <label for="area_id">Area</label>
                <select name="area_id" id="area_id" class="form-control"></select>
            </div>

            <!-- Beat fields -->
            @for ($i = 1; $i <= 12; $i++)
                <div class="form-group">
                    <label for="beat_{{ $i }}">Beat {{ $i }}</label>
                    <input type="text" name="beat_{{ $i }}" id="beat_{{ $i }}"
                        value="{{ $beat->{'beat_' . $i} }}" class="form-control">
                </div>
            @endfor

            <div class="form-group">
                <label for="emp_role_id">EMP Role</label>
                <select name="emp_role_id" id="emp_role_id" class="form-control">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" @if ($role->id == $beat->emp_role_id) selected @endif>
                            {{ $role->role }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="customer_type">Customer Type</label>
                <select name="customer_type" id="customer_type" class="form-control">
                    @foreach ($types as $type)
                        <option value="{{ $type->customer_type }}" @if ($type->customer_type == $beat->customer_type) selected @endif>
                            {{ $type->customer_type }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="customer_name">Customer Name</label>
                <input type="text" name="customer_name" id="customer_name" value="{{ $beat->customer_name }}"
                    class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update Beat</button>
        </form>
    </div>
@endsection
