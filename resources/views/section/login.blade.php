@vite(['resources/css/app.css', 'resources/js/app.js'])

<form action="{{ route('section.login') }}" method="POST">
    @csrf

    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Password</label>
    <input type="password" name="password" id="password" required>

    <button type="submit">Login</button>

</form>

<a href="{{ route('section.registration') }}">
    <button type="button">Register</button>
</a>
