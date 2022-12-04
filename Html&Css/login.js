$(document).ready(function() {
    var loginBttn= $('#login');
    
    loginBttn.on('click', function(element) {
        element.preventDefault();
        var loginEmail = $('#loginEmail').val();
        var loginPassword = $('#loginPassword').val();

    
        $.ajax('UserCreation.php', {
        method: 'POST',
        data: {
            loginEmail: loginEmail,
            loginPassword: loginPassword,

        }
        }).done(function(response) {
        var resp = response;
        $('#result').html(resp);
        }).fail(function() {
        alert('There was a problem with the request.');
        });
    
    })
    });