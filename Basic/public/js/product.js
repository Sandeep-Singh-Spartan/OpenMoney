$(document).ready(function(){
    $('#handlePayment').submit(function(e){
        e.preventDefault();
        console.log("inside js of payment");
        let Useremail = $('#email').val();
        let userMobile = $('#mobile').val();
        let amount = $('#amount').val();
        $.ajax({
            type: 'POST',
            url: '/api/createPaymentToken',
            data: {email_id :Useremail,contact_number: userMobile, amount: amount},
            success: function(response){
                if(response){
                    localStorage.setItem("paymentToken",response);
                    alert("Token Created Please processed with payment");

                } else {
                    $('#error').text(response);
                    document.write("<p>Opps ! Something went wrong</p>");

                }
            }
        });
    });
});
