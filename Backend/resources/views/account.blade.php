<header>
    
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/customer.css') }}">

<header>
    @include('header')
</header>


<head>
    <!-- Head content -->
</head>
<body>

    <div class="AccountsInfo">

        <h1>Account Information</h1><br>
        <!-- Add a button or link to redirect users to their individual account information page -->
        <button type="button" class="button-save" onclick="location.href='{{ route('profile.show', ['customerId' => Auth::id()]) }}'">View Account Information</button>


    </div>


</body>

<footer>
    @include('footer')
</footer>



</html>


