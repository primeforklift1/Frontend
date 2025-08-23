$(document).ready(function () {
    $("#login").click(function(){
        let body = {
            username:$("#email").val(),
            password:$("#password").val()
        }
        console.log(body);

        fetch(apiURL + '/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(body)
        })
        .then(response => response.json())
        .then(data => {
            console.log('Login berhasil:', data.data.token);
            localStorage.setItem("authToken", data.data.token);
            localStorage.setItem("userInfo", data.data);
            window.location.href = "/admin";
            alert('Login berhasil!');
        })
        .catch(error => {
            console.error('Login gagal:', error);
            alert('Login gagal!');
        });
    });
});