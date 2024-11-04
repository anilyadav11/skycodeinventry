<!-- resources/views/rsms/edit.blade.php -->

@extends('layout.app')
@section('title', 'Edit RSM')

@section('content')
    <div class="m-4">
        <h2 class="my-4">Edit RSM</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <a class="btn btn-info text-white" href="{{ route('rsms.index') }}">Go Back</a>
        <form action="{{ route('rsms.update', $rsm) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="emp_name">Employee Name</label>
                <input type="text" name="emp_name" class="form-control" value="{{ $rsm->emp_name }}" required>
            </div>

            <div class="form-group">
                <label for="user_role">User Role</label>
                <input type="text" value="Regional Sales Manager" class="form-control" disabled>
            </div>

            <div class="form-group">
                <label for="phone_no">Phone Number</label>
                <input type="text" name="phone_no" class="form-control" value="{{ $rsm->phone_no }}" required>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" class="form-control" required>{{ $rsm->address }}</textarea>
            </div>

            <div class="form-group">
                <label for="region">Region</label>
                <select name="region" class="form-control" required>
                    <option value="">Select Region</option>
                    @foreach ($regions as $region)
                        <option value="{{ $region->region_zone }}"
                            {{ $rsm->region == $region->region_zone ? 'selected' : '' }}>
                            {{ $region->region_zone }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $rsm->email }}">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update RSM</button>
        </form>
    </div>
@endsection
