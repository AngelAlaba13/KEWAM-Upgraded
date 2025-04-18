@vite(['resources/css/app.css', 'resources/js/app.js'])

<form action="{{ route('section.registration') }}" method="POST">
    @csrf

    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required autofocus>
    </div>

    <div>
        <label for="role">Role</label>
        <input type="text" name="role" id="role" required>
    </div>

    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
    </div>

    <div>
        <label for="conPassword">Confirm Password</label>
        <input type="password" name="password_confirmation" id="conpassword" required>
    </div>

    <button type="submit">Register</button>
</form>
