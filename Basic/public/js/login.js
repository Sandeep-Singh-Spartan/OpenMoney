$(document).ready(function(){
    $('#handleAjax').submit(function(e){
        e.preventDefault(); // prevent the form from submitting normally
        let username = $('#username').val();
        let password = $('#password').val();
        sessionStorage.setItem('email', username);
        //localStorage.setItem('email', username);
        $.ajax({
            type: 'POST',
            url: '/api/login',
            data: {email: username, password: password},
            success: function(response){
                console.log("response",response);
                if(response.token_type ==='bearer' && response.res===0 ) {
                    localStorage.setItem('token', response.access_token);
                    document.write("<p>User Logged In Successfully</p>");
                    setTimeout(function() {
                        window.location.href = 'http://127.0.0.1:8000/CreateVirtualAccount'
                    },3000)

                }else if(response.res===1){
                    localStorage.setItem('token', response.access_token);
                    document.write("<p>User Logged In Successfully</p>");
                    setTimeout(function() {
                        window.location.href = 'http://127.0.0.1:8000/VirtualAccount'
                    },3000)
                } else{
                    document.write("<p>User does not exits</p>");
                    setTimeout(function() {
                        window.location.href = 'http://127.0.0.1:8000/registration'
                    },3000)
                }
            }
        });
    });
});
