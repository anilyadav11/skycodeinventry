@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Customer Details</h1>

        <table class="table table-bordered">
            <tr>
                <th>Region Zone</th>
                <td>{{ $customer->region_zone ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>State</th>
                <td>{{ $customer->state->name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>District</th>
                <td>{{ $customer->district->name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Area</th>
                <td>{{ $customer->area->name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Customer Type</th>
                <td>{{ $customer->customer_type }}</td>
            </tr>
            <tr>
                <th>Supplier</th>
                <td>{{ $customer->supplier }}</td>
            </tr>
            <tr>
                <th>Customer Name</th>
                <td>{{ $customer->customer_name }}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{ $customer->address }}</td>
            </tr>
            <tr>
                <th>Owner Name</th>
                <td>{{ $customer->owner_name }}</td>
            </tr>
            <tr>
                <th>Phone No</th>
                <td>{{ $customer->phone_no }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $customer->email }}</td>
            </tr>
            <tr>
                <th>GST</th>
                <td>{{ $customer->GST }}</td>
            </tr>
            <tr>
                <th>PAN</th>
                <td>{{ $customer->PAN }}</td>
            </tr>
            <tr>
                <th>Beat 10</th>
                <td>{{ $customer->beat_10 }}</td>
            </tr>
            <tr>
                <th>Beat 11</th>
                <td>{{ $customer->beat_11 }}</td>
            </tr>
            <tr>
                <th>Beat 12</th>
                <td>{{ $customer->beat_12 }}</td>
            </tr>
            <tr>
                <th>RSM</th>
                <td>{{ $customer->rsm }}</td>
            </tr>
            <tr>
                <th>ASM</th>
                <td>{{ $customer->asm }}</td>
            </tr>
            <tr>
                <th>ASE</th>
                <td>{{ $customer->ase }}</td>
            </tr>
            <tr>
                <th>SO</th>
                <td>{{ $customer->so }}</td>
            </tr>
            <tr>
                <th>SR</th>
                <td>{{ $customer->sr }}</td>
            </tr>
        </table>

        <a href="{{ route('customer-creation.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection
