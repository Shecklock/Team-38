<head>
    {{-- Other styles and scripts --}}
    <link href="{{ asset('css/product_details.css') }}" rel="stylesheet">
    <link href="{{ asset('css/reviews.css') }}" rel="stylesheet">
</head>


{{-- Including product details from the products directory --}}
@include('products.product_details')

{{-- Including reviews from the products directory --}}
@include('products.review')
