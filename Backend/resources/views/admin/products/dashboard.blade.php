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
                <h4 class="card-title">Recent Orders</h4>
            </div>
        </div>
    </div>
</div>
// @extends('layouts.admin')

// @section('content')

//     <div class="pull-left">
//         <h2>Order Status System</h2>
//     </div>

//     <div class="row">
//         <div class="col-lg-12 margin-tb">
//             <div class="pull-right">
//                 @include('admin.components.search_form_order') {{-- Make sure the path matches your structure --}}
//             </div>
//         </div>
//     </div>



@endsection


