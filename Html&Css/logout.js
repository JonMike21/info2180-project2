$(document).ready(function() {

    var logoutBttn= $('#logout');
    $logout=true;
    $errorMsg="";
    


    logoutBttn.on('click',function(element) {
        //alert("yessah");
        element.preventDefault();
        var logout = true;
        $.ajax('logout.php',{
        method:'POST',
        data: {
            logout: logout
        }

        }).done(function(data) {
            var resp = data;
            
        if(resp == $logout){
            alert("Logging Out");
            //session_unset();
            session_destroy();
            window.location.replace('UserLogin.html');
        }else{
            $errorMsg="Error"
            alert(resp);
        }
        }).fail(function() {
            alert('There was a problem with the request.');
        });
        //return false;
        
    })
});