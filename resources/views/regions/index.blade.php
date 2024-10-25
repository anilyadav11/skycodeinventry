@extends('layout.app')
@section('title', 'Sales Regions')

@section('content')
    <h2 class="m-4">Regions List</h2>
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
    <div class="d-flex justify-content-between align-items-center my-4">
        <div>
            Showing {{ $regions->firstItem() }} to {{ $regions->lastItem() }} of {{ $regions->total() }} entries
        </div>
        <div>
            {{ $regions->links() }} <!-- This will generate the pagination links -->
        </div>
    </div>
@endsection
