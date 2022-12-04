$(document).ready(function() {

    var loginBttn= $('#login');
    $loginMsg = "Successfully Login...";
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

        }})
        .done(function(data) {
            var resp = data;
            if(resp == $errorMsg){
                alert($errorMsg);
            }else{
                if(resp == $loginMsg){ //check php side, determine if successful or not
                    window.open('Dashboard.html', '_blank');  
                }
                else{
                    $errorMsg = "Invalid Login"
                    alert($errorMsg);
                }

            }
            


        })
        .fail(function() {
            alert('There was a problem with the request.');
        });
    
    })


});