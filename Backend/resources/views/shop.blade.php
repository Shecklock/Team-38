<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
</head>
{{-- <body>
    <header>
        <div id="header">
            <div class="container1">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="home"><img src="{{ asset('assets/sources/logo2.png') }}" class="logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <input class="nav-link" type="text" placeholder="Search..">
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="a">Products</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="contact_us.html">Contact Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about-us">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-dark" href="{{ route('shopping.cart') }}">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart 
                                    <span class="badge bg-danger">{{ count((array) session('cart')) }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header> --}}

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div> 
        @endif
        @yield('content')
    </div>

    @yield('scripts')
    {{-- <footer>
        <p>
            <a href="contact-us">Contact us</a><br>
            Telephone: +44 123435390 <br>
            Email: sportifypromax@gmail.com

        </p>
        <p>
            <a href="about-us">About us </a><br>
            Address: Aston St, Birmingham B4 7ET
        </p>
        <p>
                <a href="faqs">FAQs</a><br>
                <a href="https://www.instagram.com/">Instagram</a><br>
                <a href="https://en-gb.facebook.com/">Facebook</a><br>
                <a href="https://twitter.com/login">X</a>
            </p>
    </footer> --}}

</body>


</html>
