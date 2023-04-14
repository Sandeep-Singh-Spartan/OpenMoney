<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" rel="noopener" target="_blank" href="/css/paymentDone.css">
    <title>Document</title>
</head>
<body>
<div class="payment-success">
    <i class="fa fa-check-circle"></i>
    <p>Payment successful!</p>
</div>
<div>
    <button class="center-button" onclick="goToMainPage()">Click Me</button>
</div>

</body>
<script type="text/javascript">
 function goToMainPage(){
     window.location.href = 'http://127.0.0.1:8000/Product'
 }

</script>
</html>
