<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="/js/registration.js"></script>

    <link rel="stylesheet" type="text/css" rel="noopener" target="_blank" href="/css/registration.css">

</head>

<body>
<div class="container">
    <h1>Registration</h1>
    <form id="handleRegistrationAjax">
        <label for="fname">User Name</label>
        <input type="text" id="fname" name="UserName"  placeholder="Enter your User name">

        <label for="email">Email</label>
        <input type="email" id="email" name="email"  placeholder="Enter your email address">

        <label for="password">Password</label>
        <input type="password" id="password" name="password"  placeholder="Enter your password">
        <label for="password">Confirm Password</label>
        <input type="password" id="c_password" name="c_password"  placeholder="Enter your Confirm password">

        <label for="lname">Mobile Number</label>
        <input type="text" id="mobileNum" name="Mobile" placeholder="Enter your Mobile Number">

        <button type="submit">Register</button>
    </form>
</div>
</body>
</html>
