<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head>

<body>


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
