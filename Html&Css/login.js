$(document).ready(function() {

    var loginBttn= $('#login');
    $login=true;
    $errorMsg = "Email or Password missing";

    loginBttn.on('click',function(element) {
    

        element.preventDefault();
        var loginEmail = $('#loginEmail').val();
        var loginPassword = $('#loginPassword').val();

        $.ajax('login.php',{
        method:'POST',
        data: {
            loginEmail: loginEmail,
            loginPassword: loginPassword
        }

        }).done(function(data) {
            var resp = data;
            console.log(data);
        if(resp == $login){
            window.location.replace('Dashboard.html');
        }else{
            alert(resp);
        }
        }).fail(function() {
            alert('There was a problem with the request.');
        });
        
    })
});