$(document).ready(function(){
    $('#handleVirtualAccountAjax').submit(function(e){
        e.preventDefault();
        const token = localStorage.getItem("token");
        $.ajax({
            type: 'GET',
            url: '/api/open-testing/createVirtualAccount',
            headers: {
                'Authorization': 'Bearer ' + token
            },
            data: {},
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
