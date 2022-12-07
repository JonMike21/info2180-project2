$(document).ready(function() {
var saveBttn= $('#saveBttn');
$added = "User Added Sucessfully";

saveBttn.on('click', function(element) {
    element.preventDefault();
    var firstName = $('#firstName').val();
    var lastName = $('#lastName').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var role = $('#role').val();

    $.ajax('UserCreation.php', {
    method: 'POST',
    data: {
        firstName: firstName,
        lastName: lastName,
        email: email,
        password: password,
        role: role
    }
    }).done(function(response) {
    var resp = response;
    $('#result').html(resp);

    if(resp==$added){  
        //alert("hello?");
    setTimeout(function() {             
        location.replace("Dashboard.html");  
    }, 2000);
    } 
    
    }).fail(function() {
    alert('There was a problem with the request.');
    });

})
});






