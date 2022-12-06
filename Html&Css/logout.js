$(document).ready(function() {

    var logoutBttn= $('#logout');
    $logout=true;
    $errorMsg="";


    logoutBttn.on('click',function(element) {
        alert("yessah");
        element.preventDefault();
        
        var logout = $logout;

        $.ajax('logout.php',{
        method:'POST',
        data: {
            logout: logout
        }

        }).done(function(data) {
            var resp = data;
        if(resp == logout){
            session_unset();
            session_destroy();
            window.location.replace('login.html');
        }else{
            $errorMsg="Error"
            alert(resp);
        }
        }).fail(function() {
            alert('There was a problem with the request.');
        });
        return false;
        
    })
});