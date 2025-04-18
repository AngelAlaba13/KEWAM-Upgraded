<!DOCTYPE html>
<html>

<head>
    <title>Verify Your Email</title>
</head>

<body>
    <h1>Verify Your Email Address</h1>
    <p>Before proceeding, please check your email for a verification link.</p>
    <p>If you did not receive the email, click the button below to request another.</p>

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit">Resend Verification Email</button>
    </form>
</body>

</html>
