@extends('layout.app')
@section('title', 'Sales Regions')

@section('content')
    <h2 class="m-4">Regions List</h2>
    <!-- Display Success Message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Display Error Message -->
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <a href="{{ route('regions.create') }}" class="btn btn-primary m-3 ">Create New Region</a>

    <div class="table-responsive p-5">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Region Zone</th>
                    <th>State</th>
                    <th>District</th>
                    <th>Area</th>
                    <th>BZone</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($regions as $region)
                    <tr>
                        <td>{{ $region->id }}</td>
                        <td>{{ $region->region_zone }}</td>
                        <td>{{ $region->state }}</td>
                        <td>{{ $region->district }}</td>
                        <td>{{ $region->area }}</td>
                        <td>{{ $region->bzone }}</td>
                        <td>{{ $region->latitude }}</td>
                        <td>{{ $region->longitude }}</td>
                        <td>
                            <a href="{{ route('regions.edit', $region->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('regions.destroy', $region->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Pagination Links -->
    <div class="card shadow-sm my-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div class="text-muted">
                Showing {{ $regions->firstItem() }} - {{ $regions->lastItem() }} of {{ $regions->total() }}
            </div>
            <div>
                <!-- Add custom styling to the pagination links -->
                <nav aria-label="Page navigation">
                    <ul class="pagination mb-0">
                        <li class="page-item">
                            {{ $regions->onEachSide(1)->links('pagination::bootstrap-4') }}
                            <!-- Use Bootstrap 4 pagination styling -->
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

@endsection
