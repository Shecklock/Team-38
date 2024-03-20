<html lang = "en">
   <head>
        <title>404 Page Not Found</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/404.css') }}">
        <script src="https://kit.fontawesome.com/155df07167.js" crossorigin="anonymous"></script>
   </head>
   <body>
    <header>
        @include('header')
    </header>
      <div clas="content">
         <h3>404 error. The page you are looking for does not exist, or is temporarily unavailable.</h3>
      </div>
      <footer>
            @include('footer')
      </footer>
   </body>
</html