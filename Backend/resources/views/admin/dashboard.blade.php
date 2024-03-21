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
        </div>
    </div>
</div>

<!-- Chart Container -->
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Order Status</h4>
            </div>
            <!-- <div style="width: 500px;"><canvas id="dimensions"></canvas></div><br/> -->
            <div style="width: 800px;"><canvas id="stockChart"></canvas></div>

            <!-- <script type="module" src="dimensions.js"></script> -->
            <script type="module" src="resources/js/chart.js"></script>
            @vite('resources/js/chart.js')
        </div>
    </div>
</div>

@endsection


