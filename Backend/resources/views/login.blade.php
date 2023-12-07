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
                    <li><a href="index.html"><img src="sources/logo2.png" width="100px" height="100px"></a></li>
                </div>
                <nav>
                    <ul>
                        <li><a href="">Home</a></li>
                        <li><a href="">Products</a></li>
                        <li><a href="">About us</a></li>
                        <li><a href="">Account</a></li>
                        <li><a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-basket" viewBox="0 0 16 16">
                                    <path
                                        d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9zM1 7v1h14V7zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5" />
                                </svg>
                            </a></li>
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
                            <li><a href="">Register here</a></li>
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
