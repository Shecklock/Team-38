<!DOCTYPE html>
<html lang="en">

<header>
    @include('header')
</header>


<head>
    <title>Products</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/products.css') }}">
    <script src="https://kit.fontawesome.com/155df07167.js" crossorigin="anonymous"></script>
</head>




    <section class="Product-Intro">
        <h1>New arrivals</h1><br>
        <p>Newest arrivals for the winter season</p><br>
        <img src="sources/productPageImage.png" height="300"><br><br>
        <button>Shop now</button>
    </section>

    {{-- <section class="pro">
        <h1 class="pheading">Our products</h1>
        <div class="products">
            <!-- card start -->
            @for ($i = 0; $i < 6; $i++)
                <div class="card">
                    <div class="img"><img src="sources/productPageImage.png"></div>
                    <div class="description">Item1</div>
                    <div class="title">Lady items</div>
                    <div class="box">
                        <div class="price">£56</div>
                        <button class="btn">Buy</button>
                    </div>
                </div>
            @endfor
            <!-- card end -->
        </div>
    </section> --}}

    <section class="pro">
        <h1 class="pheading">Our products</h1>
        <div class="products">
            <!-- card start -->
            @foreach($products as $product)
                <div class="card">
                    <a href="{{ route('productshow', ['product' => $product] )}}">
                        <img src="{{ asset('uploads/product/' . $product->image) }}" alt="" class="productImg" height="100px">
                        </a>                    
                    <div class="description">{{ $product->Description }}</div>
                    <div class="title">{{ $product->ProductName }}</div>
                    <div class="box">
                        <div class="price">£{{ $product->Price }}</div>
                        <button class="productButton">
                            <a href="{{ route('add-to-basket', ['productId' => $product->ProductID]) }}">BUY NOW!</a>
                            </button>                    
                        </div>
                </div>
            @endforeach
            <!-- card end -->
        </div>
    </section>
    

    <footer>
        @include('footer')
    </footer>

</body>

</html>
