<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Information</title>
</head>
<body>

    <div id="viewMode">
        <h1>Customer Information</h1>

        <p><strong>Name:</strong> {{ $customer->FirstName }} {{ $customer->LastName }}</p>
        <p><strong>Email:</strong> {{ $customer->Email }}</p>
        <p><strong>Phone:</strong> {{ $customer->Phone }}</p>
        <p><strong>Address:</strong> {{ $customer->Address }}</p>
        <p><strong>City:</strong> {{ $customer->City }}</p>
        <p><strong>State:</strong> {{ $customer->State }}</p>
        <p><strong>Postcode:</strong> {{ $customer->Postcode }}</p>
        <p><strong>Country:</strong> {{ $customer->Country }}</p>

        <button onclick="toggleEdit()">Edit</button>
    </div>


    <form action="/profile/{{ $customer->id }}" method="POST">
    @csrf
    <p><strong>Name:</strong> 
            <input type="text" name="FirstName" value="{{ $customer->FirstName }}">
            <input type="text" name="LastName" value="{{ $customer->LastName }}">
        </p>
        <p><strong>Email:</strong> 
            <input type="email" name="Email" value="{{ $customer->Email }}">
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
</form>




    

   
</body>
</html>


<script>
function toggleEdit() {
    var viewMode = document.getElementById('viewMode');
    var editMode = document.getElementById('editMode');
    viewMode.style.display = (viewMode.style.display === 'none' ? '' : 'none');
    editMode.style.display = (editMode.style.display === 'none' ? '' : 'none');
}
</script>