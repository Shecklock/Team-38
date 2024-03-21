<!DOCTYPE html>
<html lang="en">

<head>
<header>
    @include('header')
</header>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/customer.css') }}">
    <title>Edit Customer Information</title>
    <script>
        function clearEditableFields() {
            var form = document.getElementById("editForm");
            form['Phone'].value = '';
            form['Address'].value = '';
            form['City'].value = '';
            form['State'].value = '';
            form['Postcode'].value = '';
            form['Country'].value = '';
        }
    </script>
</head>

<div class="form-container">
        
    <body>
        
        <form id="editForm" action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')
            
            <p><strong>Name:</strong> 
                <input type="text" name="FirstName" value="{{ $customer->FirstName }}" readonly>
            </p>
            <p><strong>Email:</strong> 
                <input type="email" name="Email" value="{{ $customer->Email }}" readonly>
            </p>
            <p><strong>Phone:</strong> 
                <input type="text" name="Phone" value="{{ $customer->Phone }}">
            </p>
            <p><strong>Address:</strong> 
                <input type="text" name="Address" value="{{ $customer->Address }}">
            </p>
            <p><strong>City:</strong> 
                <input type="text" name="City" value="{{ $customer->City }}">
            </p>
            <p><strong>State:</strong> 
                <input type="text" name="State" value="{{ $customer->State }}">
            </p>
            <p><strong>Postcode:</strong> 
                <input type="text" name="Postcode" value="{{ $customer->Postcode }}">
            </p>
            <p><strong>Country:</strong> 
                <input type="text" name="Country" value="{{ $customer->Country }}">
            </p>

            <button type="submit">Save</button>
            <button type="button" onclick="window.location.href='/'">Back to Home</button>
            <button type="button" onclick="clearEditableFields()">Clear Fields</button>
        </form>
    </body>
</div>


<footer>
    
    @include('footer')
</footer>

</html>
