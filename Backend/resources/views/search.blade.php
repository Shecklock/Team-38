<!-- resources/views/search.blade.php -->


<!DOCTYPE html>

<html lang = "en">

<header>
    @include('header')
</header>


    <head>
        <title>About Us</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/search.css') }}">
        <script src="https://kit.fontawesome.com/155df07167.js" crossorigin="anonymous"></script>
    </head>
    <body>
  
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
    @include('footer')
</footer>
</body>
</html>

