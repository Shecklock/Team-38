<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style2.css') }}">
</head>

<body>


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

    
</body>

</html>
