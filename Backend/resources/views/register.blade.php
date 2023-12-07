<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style2.css') }}">
</head>

<body>
    <header>
    <a href="home"><img src="{{ asset('assets/sources/logo2.png') }}" class="logo"></a>
        <nav>
            <ul>
                <!-- Nav Bar -->
                <li><input type="text" placeholder="Search.."></li>
                <li><a href="home">Home</a></li>
                <li><a href="#">Products</a></li>
                <li class="active"><a href="contact-us">Contact Us</a></li>
                <li><a href="about-us">About Us</a></li>
                <li><a href="#">Account</a></li>
                <li><a href="basket"><i class="fa-solid fa-basket-shopping"></i></a></li>
                <!-- Nav Bar -->
            </ul>
        </nav>
    </header>

    <main>
        <section id="home">
            <h1></h1>
            <p>Don't have an account?</p>
            <form action="" method="post">
                @csrf
                <p>First name:</p>
                <input type="text" name="firstname" placeholder="First name" required>
                <p>D.O.B:</p>
                <input type="text" name="dob" placeholder="Date of birth" required>
                <p>Email:</p>
                <input type="email" name="email" placeholder="Email address" required>
                <p>Password:</p>
                <input type="password" name="password" placeholder="password" required></br>
                <input type="submit" value="Sign Up">
            </form>
        </section>

        <section id="">
            <h2></h2>
            <p></p>
        </section>

        <section id="">
            <h2></h2>
            <p></p>
        </section>
    </main>

    <footer>
        <p></p>
    </footer>
</body>

</html>
