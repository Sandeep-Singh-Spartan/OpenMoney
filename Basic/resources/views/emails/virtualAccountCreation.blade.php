<!DOCTYPE html>
<html>
<head>
    <title>Virtual Account</title>
</head>
<body>
<h2>Account is created</h2>
<p>Dear User, Your Virtual Account is created successfully</p>
<ul>
    <li>Virtual Account Number: {{ $VANumber }}</li>
    <li>URL: <a href="{{ $login_url }}">Check Account Balance</a></li>
    <li>Mobile number: {{ $mobile_number }}</li>
</ul>
</body>
</html>
