<!DOCTYPE html>
<html lang="en">

<header>
    @include('header')
</header>


<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/about2.css') }}">
    <script src="{{ asset('js/contact.js') }}"></script>
    <script src="https://kit.fontawesome.com/155df07167.js" crossorigin="anonymous"></script>
</head>
<body>

    
    <div class="container">
        <h1>Connect with us: </h1>

        <div class="contact-box">
            <div class="contact-form">
                <h3>Contact us here:</h3>
                <form id="myForm">
                    <div class="input-info">
                        <div class="inputs">
                            <label for="First-name">First Name:</label>
                            <input type="text" placeholder="First Name" required>
                        </div>
                        <div class="inputs">
                            <label for="Lastname">Last Name:</label>
                            <input type="text" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="input-info">
                        <div class="inputs">
                            <label for="email">Email:</label>
                            <input type="email" placeholder="Enter Email" required>
                        </div>
                        <div class="inputs">
                            <label for="phonenumber">Phone No:</label>
                            <input type="text" placeholder="+44">
                        </div>
                    </div>
                    <label>Message</label>
                    <textarea name="reason-for-contact" placeholder="message" cols="20" rows="5">Enter reason here...</textarea>
                    <!-- <input type="submit" value="Submit"> -->
                    <button type="submit">Submit</button>
                </form>
                <script>
                    document.getElementById('myForm').addEventListener('submit', function(event) {
                        event.preventDefault();
                        window.location.href = '{{ url("about_us.html") }}'; 
                    });
                </script>
            </div>

            <div class="company-info">
                <h3>Company details:</h3>
                <table>
                    <tr>
                        <td>Email: </td>
                        <td>sportifypromax@gmail.com</td>
                    </tr>
                    <tr>
                        <td>Phone: </td>
                        <td>+44 123435390</td>
                    </tr>
                    <tr>
                        <td>Address: </td>
                        <td>Aston St, Birmingham B4 7ET</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <footer>
        @include('footer')
    </footer>

</html>
