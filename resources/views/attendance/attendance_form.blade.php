@extends('layout.app')

@section('content')
<div class="container">
    <h2>Mark Employee Attendance</h2>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('attendance.store') }}">
        @csrf
        <div class="mb-3">
            <label for="attendance_date" class="form-label">Attendance Date</label>
            <input type="date" name="attendance_date" id="attendance_date" class="form-control" required>
        </div>

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
            <button type="button" id="filterButton" class="btn btn-primary">Load Employees</button>
        </div>

        <div class="mt-4">
            <h4>Employees</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Employee Name</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="employeeTable">
                    <tr>
                        <td colspan="3" class="text-center">No employees available</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <button type="submit" class="btn btn-success mt-3">Submit Attendance</button>
    </form>
</div>


@endsection