<!-- resources/views/rsms/show.blade.php -->

@extends('layout.app')
@section('title', 'RSM Overview')

@section('content')
    <div class="m-4">
        <h2 class="my-4">RSM Details</h2>
        <div class="card">
            <div class="card-body">
                <p><strong>User ID:</strong> {{ $rsm->user_id }}</p>
                <p><strong>Employee Name:</strong> {{ $rsm->emp_name }}</p>
                <p><strong>Phone No:</strong> {{ $rsm->phone_no }}</p>
                <p><strong>Region:</strong> {{ $rsm->region }}</p>
                <p><strong>Address:</strong> {{ $rsm->address }}</p>
                <p><strong>Email:</strong> {{ $rsm->email }}</p>
            </div>
        </div>
        <a href="{{ route('rsms.index') }}" class="btn btn-secondary mt-3">Back to List</a>
    </div>
@endsection
