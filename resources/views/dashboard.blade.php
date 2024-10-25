@extends('layout.app')
@section('title', 'Dashboard')

@section('content')

    <div class="container">
        <div class="border-bottom pt-6">
            <div class="row align-items-center">
                <div class="col-sm col-12">
                    <h1 class="h2 ls-tight"><span class="d-inline-block me-3">👋</span>Hi, {{ $user->name }}!</h1>
                </div>
            </div>
        </div>
        <h1>Welcome to the Dashboard</h1>
        <p>This is your main dashboard.</p>
    </div>
@endsection
