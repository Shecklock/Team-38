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
                    <input type="text" name="name" value="{{ $user->name }}">
                </p>
                <p><strong>Email:</strong> 
                    <input type="email" name="email" value="{{ $user->email }}" readonly>
                </p>
                <p><strong>Phone Number:</strong> 
                    <input type="text" name="phone_number" value="{{ $user->phone->phone_number ?? '' }}">
                </p>
                <p><strong>Address:</strong> 
                    <input type="text" name="address" value="{{ $user->address->address ?? '' }}">
                </p>
                <p><strong>City:</strong> 
                    <input type="text" name="city" value="{{ $user->address->city ?? '' }}">
                </p>
                <p><strong>State:</strong> 
                    <input type="text" name="state" value="{{ $user->address->state ?? '' }}">
                </p>
                <p><strong>Postcode:</strong> 
                    <input type="text" name="postcode" value="{{ $user->address->postcode ?? '' }}">
                </p>
                <p><strong>Country:</strong> 
                    <input type="text" name="country" value="{{ $user->address->country ?? '' }}">
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
            form['phone_number'].value = '';
            form['address'].value = '';
            // Add other fields to clear as necessary
            form['city'].value = '';
            form['state'].value = '';
            form['postcode'].value = '';
            form['country'].value = '';
        }
    </script>
</body>
</html>
