<!-- resources/views/search.blade.php -->


<!DOCTYPE html>

<html lang = "en">
    <head>
        <title>About Us</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/search.css') }}">
        <script src="https://kit.fontawesome.com/155df07167.js" crossorigin="anonymous"></script>
    </head>
    <body>
    @include('header')
        <nav> 
            <!-- This code gets the product details from the database -->
        <div class="product" id="product">
            @forelse($search as $product)
                <div class="productItem">
                    <div class="productDetails">
                        <img src="{{ asset('uploads/product/' . $product->image) }}" alt="" class="productImg" height="100px">
                        <h1 class="productTitle">{{ $product->ProductName }}</h1>
                        <h2 class="productPrice">${{ $product->Price }}</h2>
                        <p class="productDesc">{{ $product->Description }}</p>
                        <button class="productButton">
                            <a href="{{ route('add-to-basket', ['productId' => $product->ProductID]) }}">BUY NOW!</a>
                            </button>                    
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </nav>
<!-- If there was no product found then it uses this code to display no products found -->
    <div id="NoSearchFound">
        <h1>Search Results</h1>

        @if($search->isEmpty())
            <p>No products found.</p>
        @else
            {{-- Display your search results here --}}
            @foreach($search as $product)
                {{-- Your product display logic --}}
            @endforeach

            {{-- Add pagination links if necessary --}}
            {{ $search->links() }}
        @endif
    </div>
</nav>
<!-- All the footer code -->
<footer>
    <p>
        <a href="contact_us.html">Contact us</a><br>
        Telephone: +44 123435390 <br>
        Email: sportifypromax@gmail.com
    </p>
    <p>
        <a href="{{ route('about_us') }}">About us</a><br>
        Address: Aston St, Birmingham B4 7ET
    </p>
    <p>
        <a href="https://www.instagram.com/">Instagram</a><br>
        <a href="https://en-gb.facebook.com/">Facebook</a><br>
        <a href="https://twitter.com/login">X</a>
    </p>
</footer>
</body>
</html>

