@extends('layout.app')

@section('content')
<div class="container">
    <h2>Filter Employee Attendance</h2>
    <form id="filterForm" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <label for="region" class="form-label">Region</label>
                <select id="region" name="region_id" class="form-select">
                    <option value="">Select Region</option>
                    @foreach ($regions as $region)
                    <option value="{{ $region->region_zone }}">{{ $region->region_zone }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="state" class="form-label">State</label>
                <select id="state" name="state_id" class="form-select" disabled>
                    <option value="">Select State</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="district" class="form-label">District</label>
                <select id="district" name="district_id" class="form-select" disabled>
                    <option value="">Select District</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="area" class="form-label">Area</label>
                <select id="area" name="area_id" class="form-select" disabled>
                    <option value="">Select Area</option>
                </select>
            </div>
        </div>
        <div class="mt-3">
            <button type="button" id="filterButton" class="btn btn-primary">Filter</button>
        </div>
    </form>

    <h3>Employee Attendance</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Employee Name</th>
                <th>Region</th>
                <th>State</th>
                <th>District</th>
                <th>Area</th>
            </tr>
        </thead>
        <tbody id="attendanceTable">
            <tr>
                <td colspan="6" class="text-center">No data available</td>
            </tr>
        </tbody>
    </table>
</div>


@endsection