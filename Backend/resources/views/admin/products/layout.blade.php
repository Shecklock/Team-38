@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
              <div class="me-md-3 me-xl-5">
                @if(session('message'))
                    <h2>{{ session('message') }},</h2>
                @endif
                <head>
                <title>Product Management System</title>
                <link rel="https:stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"rel="stylesheet">
                </head>

                <body>

                    <div class="container">
                        @yield('content')
                    </div>

                </body>
                </html>

@endsection