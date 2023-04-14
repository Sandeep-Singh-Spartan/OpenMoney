<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
<h2>Welcome to Open Money</h2>
<p>Dear {{$username}}  We are delighted to welcome you to our platform! Thank you for registering with us.

    Your registration has been successfully processed and you are now a member of our community. Our platform is designed to help you achieve your goals, connect with other like-minded individuals, and access a wide range of resources.

    To get started, please log in to your account using this credentials you provided during registration.
</p>
<ul>
    <li>Mobile number: {{ $mobile_number }}</li>
    <li>Email id: {{ $email }}</li>
    <li>URL: <a href="{{ $login_url }}">{{ $login_url }}</a></li>
</ul>
</body>
</html>
