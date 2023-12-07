<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head>

<body>
    <header>
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <li><a href="home"><img src="{{ asset('assets/sources/logo2.png') }}" width="100px" height="100px"></a></li>
                </div>
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
            </div>
        </div>
    </header>

    <main>
        <div class="account-page">
            <div class="row">
                <div class="col-2">
                    <form class="form-container" method="post" action="login_process.php">
                        <h1>Login</h1>
                        <label>
                            Admin <input type="radio" name="rdo" value="a" />
                        </label>
                        <label>
                            Customer <input type="radio" name="rdo" value="b" />
                        </label>
                        <p>Enter your username :</p><input type="text" name="username" />
                        <p>Enter your password :</p><input type="password" name="password" /><br>
                        <br><button type="submit" class="submit">Login</button>

                        <div class="passwordReset">
                            <ul>
                                <li><a href="Forgot_password.html">Forgot password</a></li><br>
                            </ul>
                        </div>

                        <div class="Register">
                            <p>First time shopping in our store?</p><br>
                            <li><a href="sign-up">Register here</a></li>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer>

    </footer>
</body>

</html>
