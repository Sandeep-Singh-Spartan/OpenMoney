<!DOCTYPE html>
<html>
<head>
    <title>Passbook</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="/js/virtualAccount.js"></script>
    <link rel="stylesheet" type="text/css" rel="noopener" target="_blank" href="/css/getBalance.css">
</head>
<body onload="showTables()">
<h1>Virtual Account</h1>
<table id="records_table" >
    <tr>
        <th>Virtual Account Number</th>
        <th>Name</th>
        <th>Email</th>
        <th>Balance</th>

    </tr>
    <tbody id="balance">
    <!-- more transactions -->
    </tbody>
</table>
<div class="button_ref_log">
    <button class="refButton" onclick="getBalance()">Refresh !</button>
    <button class="buttonClass" onclick="getLogout()">Logout !</button>
</div>

</body>
<script type="text/javascript">

    $(document).ready(function(){
        $('#handleVirtualAccountAjax').submit(function(e){
            e.preventDefault();
            let username = $('#name').val();
            let primary_Contact = $('#primary_contact').val();
            let Contact_Type = $('#contact_type').val();
            let email = $('#email_id').val();
            let mobile = $('#mobile_number').val();
            $.ajax({
                type: 'POST',
                url: '/api/createVirtualAccount',
                data: {name: username, primary_contact: primary_Contact,contact_type:Contact_Type,email_id:email,mobile_number:mobile},
                success: function(response){
                    //console.log(data);
                    if(response === 'Account Created'){
                        document.write("<p>Virtual Account Created Successfully</p>");
                        setTimeout(function() {
                            window.location.href = 'http://127.0.0.1:8000/VirtualAccount'
                        }, 3000)

                    } else{
                        document.write("<p>Opps ! please try again</p>");
                        setTimeout(function() {
                            window.location.href = 'http://127.0.0.1:8000/CreateVirtualAccount'
                        },3000)

                    }
                }
            });
        });
    });
    function getLogout(){
        window.location.href = 'http://127.0.0.1:8000/login'
    }

</script>
</html>

