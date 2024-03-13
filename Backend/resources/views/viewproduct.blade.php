{{-- <p> This is Product </p>
<h1 class="productTitle">{{ $product->ProductName }}</h1> --}}


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommerce Product View Design</title>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>

    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">
                        <img src="{{ asset('uploads/product/' . $product->image) }}" alt="" class="productImg" height="100px">
                        </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h1 class="productTitle">{{ $product->ProductName }}
                            <label class="label-stock bg-success">In Stock</label>
                        </h1>
                        <hr>
                        <p class="product-path">
                            <a href="{{ url('/search?search=Men') }}" class="path-link">Men</a> /
                            <a href="{{ url('/search?search=Women') }}" class="path-link">Women</a> /
                            <a href="{{ url('/search?search=Trainers') }}" class="path-link">Trainers</a> /
                            <a href="{{ url('/search?search=Accessories') }}" class="path-link">Accessories</a>
                        </p>
                        

                        <div>
                            <span class="productPrice">£{{ $product->Price }}
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1"><i class="fa fa-minus"></i></span>
                                {{-- <input type="text" value="1" class="input-quantity" /> --}}
                                <input type="number" name="quantity" class="input-quantity" value="{{ $item['quantity'] ?? 1 }}" min="1">
                                <span class="btn btn1"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <a href="{{ route('add-to-basket', ['productId' => $product->ProductID]) }}"" class="btn btn1"> <i class="fa fa-shopping-cart"></i> Add To Cart</a>
                            {{-- <a href="" class="btn btn1"> <i class="fa fa-heart"></i> Add To Wishlist </a> --}}
                        </div>
                        <div class="mt-3">
                            <p class="productDesc">{{ $product->Description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
