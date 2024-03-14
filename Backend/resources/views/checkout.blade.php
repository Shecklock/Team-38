<!DOCTYPE html>
<html lang="en">

<header>
    @include('header')
</header>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="{{ asset('assets/css/style2.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/155df07167.js" crossorigin="anonymous"></script>
</head>
<header>
    

    <div class="container">
        <span class="big-circle"></span>

        <!-- Add this section to display basket items -->
<h3 class="title">Basket Items</h3>
<div class="basket-items">
    <ul>
        @foreach($basketItems as $item)
        <li>{{ $item['name'] }} - ${{ $item['price'] }}</li>
        @endforeach
    </ul>
</div>

<!-- Add a button to confirm the order -->
<form action="{{ route('checkout.process') }}" method="post">
    @csrf
    <button type="submit">Confirm Order</button>
</form>

        
            </div>
        </div>
    </div>
    <footer>
        @include('footer')
    </footer>

</body>
</html>
