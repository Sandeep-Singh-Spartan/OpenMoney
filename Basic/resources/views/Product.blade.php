<!DOCTYPE html>
<html>
<head>
    <title>Payment Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="/js/product.js"></script>
    <link rel="stylesheet" type="text/css" rel="noopener" target="_blank" href="/css/product.css">

</head>
<body>
<div class="container">
    <h1>Beats EP</h1>
    <img src="/images/Headphones.png" alt="Item Image">
    <p>The preferred choice of a vast range of acclaimed DJs. Punchy, bass-focused sound and high isolation. Sturdy headband and on-ear cushions suitable for live performance</p>
    <p class="price">Price: [100.00]</p>
    <form id="handlePayment" >
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="mobile">Mobile Number:</label>
        <input type="text" id="mobile" name="mobile" required>

        <label for="">Amount:</label>
        <input type="text" id="amount" name="amount" required>

        <div>
{{--            <input type="submit" value="Pay Now">--}}


            <input type="submit" value="Token">
        </div>
    </form>
    <button class="center-button" onclick="startPayment()">Pay Now</button>
</div>

<script type="text/javascript">
    function startPayment() {
        window.location.href = 'http://127.0.0.1:8000/layer'
    }
</script>
</body>
</html>
