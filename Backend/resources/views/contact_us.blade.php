<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <script src="{{ asset('assets/js/contact.js') }}"></script>
    <script src="https://kit.fontawesome.com/155df07167.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="header">
        <div class="container1">
            <nav>
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
            </div>
        </div>
    </div>

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
                        window.location.href = "about-us"; 
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
    </footer>   
</body>
</html>
