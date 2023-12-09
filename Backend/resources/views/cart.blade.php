{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basket</title>
    <link href="{{ asset('assets/css/style2.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/155df07167.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="header">
        <div class="container1">
            <nav>
                <a href="{{ url('index.html') }}"><img src="{{ asset('sources/logo2.png') }}" class="logo"></a>
                <ul>
                    <!-- Nav Bar -->
                    <li><input type="text" placeholder="Search.."></li>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Products</a></li>
                    <li class="active"><a href="{{ url('contact_us.html') }}">Contact Us</a></li>
                    <li><a href="{{ url('about_us.html') }}">About Us</a></li>
                    <li><a href="#">Account</a></li>
                    <li><a href="{{ url('basket.html') }}"><i class="fa-solid fa-basket-shopping"></i></a></li>
                    <!-- Nav Bar -->
                </ul>
            </nav>
        </div>
    </div>

    <div class="container">
        <span class="big-circle"></span>

        <div class="form_basket">
            

                <h3 class="title">Your Basket</h3>


                <div class="total">
                    <p>Total:</p>
                    <button class="btn_basket" onclick="redirectToCheckout()">Proceed to Checkout</button>

                    <script>
                        function redirectToCheckout() {
                            window.location.href = "{{ url('checkout.html') }}";
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>
            <a href="{{ url('contact_us.html') }}">Contact us</a><br>
            Telephone: +44 123435390 <br>
            Email: sportifypromax@gmail.com
        </p>
        <p>
            <a href="{{ url('about_us.html') }}">About us </a><br>
            Address: Aston St, Birmingham B4 7ET
        </p>
        <p>
            <a href="{{ url('faqs.html') }}">FAQs</a><br>
            <a href="https://www.instagram.com/">Instagram</a><br>
            <a href="https://en-gb.facebook.com/">Facebook</a><br>
            <a href="https://twitter.com/login">X</a>
        </p>
    </footer>
</body>
</html> --}}


@extends('shop')
   
@section('content')
<table id="cart" class="table table-bordered">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Total</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @php $overallTotal = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $productIsd => $details)
                @php $subtotal = $details['quantity'] * $details['Price']; @endphp
                @php $overallTotal += $subtotal; @endphp
                <tr rowId="{{ $productId }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs">
                                <img src="{{ asset('uploads/products/' . $details['image']) }}" class="card-img-top"/>
                            </div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['ProductName'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{ $details['Price'] }}</td>
                    <td data-th="Total" class="text-center">${{ $subtotal }}</td>
                    <td class="actions">
                        <a class="btn btn-outline-danger btn-sm delete-product"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2" class="text-right">
                <strong>Overall Total:</strong>
            </td>
            <td class="text-center"><strong>${{ $overallTotal }}</strong></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ url('/home') }}" class="btn btn-primary"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                <button class="btn btn-danger">Checkout</button>
            </td>
        </tr>
    </tfoot>
</table>
@endsection
   
@section('scripts')
<script type="text/javascript">
   
    $(".edit-cart-info").change(function (e) {
        e.preventDefault();
        var ele = $(this);
        $.ajax({
            url: '{{ route('update.shopping.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("rowId"), 
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
   
    $(".delete-product").click(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
        if(confirm("Do you really want to delete?")) {
            $.ajax({
                url: '{{ route('delete.cart.product') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("rowId")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
   
</script>
@endsection

