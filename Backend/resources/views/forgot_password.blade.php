<!DOCTYPE html>
<html lang="en">
<body>
    <main>
        <!-- Keep the form, change classes for css -->
        <!-- Form to change password -->
        <form method="POST" action="/update-password">
            @csrf
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="new_password">New Password:</label>
                <input type="password" id="new_password" name="new_password" required>
            </div>
            <div>
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit">Update Password</button>
        </form>
        <!-- Success and failure conditions -->
        <!-- Data pulled from PasswordController -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            <!-- User is redirected to the login page -->
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if (session('confirm_password'))
            <div class="alert alert-danger">
                {{ session('confirm_password') }}
            </div>
        @endif
    </main>
</body>
</html>
