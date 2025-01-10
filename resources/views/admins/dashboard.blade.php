@extends('admins.admin')

@section('content')
    <h1>Welcome to the Admin Dashboard</h1>
    <p>Use the menu on the left to manage the application.</p>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Hotels</h5>
                    <p class="card-text">{{ $hotelsCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text">0</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Bookings</h5>
                    <p class="card-text">0</p>
                </div>
            </div>
        </div>
    </div>
@endsection
