<header>
    
<!DOCTYPE html>
<html lang="en">

<header>
    @include('header')
</header>


<head>
    <!-- Head content -->
</head>
<body>

    <h1>Account Information</h1>
    <!-- Add a button or link to redirect users to their individual account information page -->
    <a href="{{ route('profile.show', ['customerId' => Auth::id()]) }}" class="btn btn-primary">View Account Information</a>



</body>

<footer>
    @include('footer')
</footer>



</html>


