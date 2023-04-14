<html>
<!-- To make Layer checkout responsive on your checkout page.-->
<meta name="viewport" content="width=device-width, initial-scale=1" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!--Please add either of the following script to your HTML depending up on your environment-->

<!--For Sandbox-->
<script id="context" type="text/javascript"
        src="https://sandbox-payments.open.money/layer"></script>

<!--OR-->


<body>
<script>
    //You can bind the Layer.checkout initialization script to a button click event.
    //Binding inside a click event open Layer payment page on click of a button
    Layer.checkout({
            token: localStorage.getItem("paymentToken"),
            accesskey: "41a2e7d0-cd4e-11ed-bb09-b54d054da30b",
            theme: {
                logo : "https://open-logo.png",
                color: "#3d9080",
                error_color : "#ff2b2b"
            }
        },
        function(response) {


            if (response.status == "captured") {
                //window.location.href = "success_redirect_url";

            } else if (response.status == "created") {


            } else if (response.status == "pending") {


            } else if (response.status == "failed") {
                //window.location.href = "failure_redirect_url";

            } else if (response.status == "cancelled") {
                //window.location.href = "cancel_redirect_url";
            }
            $.ajax({
                type: 'POST',
                url: '/api/receivedResponseFromServer',
                data: {ocResponse:response},
                success: function(response){
                    if(response){
                        //localStorage.setItem("paymentToken",response);
                       // alert("Queue Job Completed");
                        //document.write("<p>Queue Job Completed</p>");
                        setTimeout(function() {
                            window.location.href = 'http://127.0.0.1:8000/PaymentResult'
                        },1000)


                    } else {
                        $('#error').text(response);
                        document.write("<p>Opps ! Something went wrong</p>");

                    }
                }
            });
        },
        function(err) {
            //integration errors
        }
    );
</script>
</body>

