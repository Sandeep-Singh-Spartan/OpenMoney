$(document).ready(function(){
    $('#handleRegistrationAjax').submit(function(e){
        e.preventDefault();
        let username = $('#fname').val();
        let email = $('#email').val();
        let password = $('#password').val();
        let c_password = $('#c_password').val();
        let mobile = $('#mobileNum').val();
        $.ajax({
            type: 'POST',
            url: '/api/registration',
            data: {name :username,email: email, password: password,c_password:c_password,mobile_number:mobile},
            success: function(response){
                if(response === 'User Registered Successfully'){
                    document.write("<p>User Registered Successfully</p>");
                    setTimeout(function() {
                        window.location.href = 'http://127.0.0.1:8000/login'
                    },3000)

                } else {
                    $('#error').text(response);
                    document.write("<p>Opps ! Something went wrong</p>");

                }
            }
        });
    });
});
