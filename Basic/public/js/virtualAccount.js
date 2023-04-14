function getBalance() {
    const email = sessionStorage.getItem('email');
    const baseURL = '/api/open-testing/getVirtualAccountBalance/';
    const token = localStorage.getItem("token");
    const path = email;
    const url = `${baseURL}`;
    console.log("url",url);

    $.ajax({
        url: url,
        type: "GET",
        contentType: "application/json; charset=utf-8",
        headers: {
            'Authorization': 'Bearer ' + token
        },
        data: "{}",
        dataType: "json",
        success: function (response) {
            console.log("response",response);
            var trHTML = '';
            $.each(response, function (i, item) {
                trHTML = '<tr><td>' + response.virtual_account_number + '</td><td>' + response.name + '</td><td>' + response.email_id + '</td><td>' + response.balance + '</td></tr>';
            });
            const table = document.getElementById('records_table');
            let row1 = table.rows[1];
            row1.style.display = "none";
            if (table.rows.length ==2) {
                $('#records_table').append(trHTML);
            }

        },
        error: function (result) {
            alert("Error");
        }
    });
}
function showTables() {
    const email = sessionStorage.getItem('email');
    const baseURL = '/api/open-testing/getVirtualAccountBalance/';
    const token = localStorage.getItem("token");
    const path = email;
    const url = `${baseURL}`;
    console.log("url",url);

    $.ajax({
        url: url,
        type: "GET",
        contentType: "application/json; charset=utf-8",
        data: "{}",
        headers: {
            'Authorization': 'Bearer ' + token
        },
        dataType: "json",
        success: function (response) {
            console.log("response",response);
            var trHTML = '';
            $.each(response, function (i, item) {
                trHTML = '<tr><td>' + response.virtual_account_number + '</td><td>' + response.name + '</td><td>' + response.email_id + '</td><td>' + 0.0 + '</td></tr>';
                return false;
            });
            const table = document.getElementById('records_table');
            if (table.rows.length ==1) {
                $('#records_table').append(trHTML);
            }

        },
        error: function (result) {
            alert("Error");
        }
    });
}

function getLogout(){
    window.location.href = 'http://127.0.0.1:8000/login'
}
