
$(document).ready(function(){
    var submit = $('#login');

    submit.on('click',function(element) {
    
        element.preventDefault();
        var loginEmail = $('loginEmail').val();
        var loginPassword = $('loginPassword').val();
        alert(loginEmail);
        
        $.ajax('login.php',{
            method:'POST',
            data: {
                loginEmail: loginEmail,
                loginPassword: loginPassword,
    
            }})
            .done(function(response) {
                console.log(response);
                var resp = response;
                $('#result').html(resp);
            })
            .fail(function() {
                console.log('There was a problem with the request.')
                alert('There was a problem with the request.');
            });
        
        });
})



    