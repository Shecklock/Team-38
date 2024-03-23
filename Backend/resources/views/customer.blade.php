<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Your Information</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/customer.css') }}">
    <script src="https://kit.fontawesome.com/155df07167.js" crossorigin="anonymous"></script>
</head>
<body>
    @include('header')

    <div class="edit-form-container">
<div class="back-button-container">
<button type="button" class="edit-button" onclick="window.location.href='{{ route('profile.show') }}'">Back to Account</button>
</div>        
<h2>Edit Your Information</h2>
        <form id="editForm" action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="edit-form-details">
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
        </div>

            <div class="button-container">
                <button type="submit" class="edit-button">Save</button>
                <button type="button" class="edit-button" onclick="window.location.href='{{ route('home') }}'">Back to Home</button>
                <button type="button" class="edit-button" onclick="clearEditableFields()">Clear Fields</button>
            </div>
        </form>
    </div>

    @include('footer')

    <script>
        function clearEditableFields() {
            var form = document.getElementById("editForm");
            form['Phone'].value = '';
            form['Address'].value = '';
            // Clear other fields as necessary
        }
    </script>
</body>
</html>
