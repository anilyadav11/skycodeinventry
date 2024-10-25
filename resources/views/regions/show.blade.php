@extends('layout.app')
@section('title', 'Sales Regions Overview')

@section('content')
    <div class="container">
        <h1>Region Details</h1>
        <ul>
            <li><strong>Region Zone:</strong> {{ $region->region_zone }}</li>
            <li><strong>State:</strong> {{ $region->state }}</li>
            <li><strong>District:</strong> {{ $region->district }}</li>
            <li><strong>Area:</strong> {{ $region->area }}</li>
            <li><strong>BZone:</strong> {{ $region->bzone }}</li>
            <li><strong>Latitude:</strong> {{ $region->latitude }}</li>
            <li><strong>Longitude:</strong> {{ $region->longitude }}</li>
        </ul>
        <a href="{{ route('regions.index') }}" class="btn btn-primary">Back to Regions</a>
    </div>
@endsection
