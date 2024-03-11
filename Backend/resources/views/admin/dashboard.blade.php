@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="me-md-3 me-xl-5">
                    <h2>Admin dashboard</h2>
                    <p class="mb-md-0">Sportify Pro Max admin dashboard.</p>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                <a href="{{ asset('/home') }}" class="btn btn-primary mt-2 mt-xl-0">Public Webpage</a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Recent Bookings</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Booking ID</th>
                                <th>Customer Name</th>
                                <th>Booking Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>123</td>
                                <td>John Doe</td>
                                <td>2024-02-27</td>
                                <td>Confirmed</td>
                            </tr>
                            <tr>
                                <td>124</td>
                                <td>Jane Smith</td>
                                <td>2024-02-26</td>
                                <td>Pending</td>
                            </tr>
                            <!-- Add more rows for other bookings -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
