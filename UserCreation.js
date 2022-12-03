/*window.onload = function() {

    var saveBttn = document.querySelector('#saveBttn');
    var httpRequest;
  
    saveBttn.addEventListener('click', function(element) {
      element.preventDefault();
  
      httpRequest = new XMLHttpRequest();
      var firstName = document.querySelector('#firstName').value;
      var lastName = document.querySelector('#lastName').value;
      var email = document.querySelector('#email').value;
      var password = document.querySelector('#password').value;
      var role = document.querySelector('#role').value;
  
      // GET Request
      var url = "UserCreation.php?firstName="+firstName;
      httpRequest.onreadystatechange = processform;
      httpRequest.open('POST', url);
      // Notice for the POST request we are setting the Content-Type
      httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      // Notice for the POST request we are passing in our name parameter as part
      // of the send method. Also ensure you encode any special characters using
      // encodeURIComponent()
      httpRequest.send('firstName=' + encodeURIComponent(firstName) + 'lastname=' + encodeURIComponent(lastName) + 'email' + encodeURIComponent(email) + 'password' + encodeURIComponent(password) + 'role' + encodeURIComponent(role));
    });
  
    function processform() {
      if (httpRequest.readyState === XMLHttpRequest.DONE) {
        if (httpRequest.status === 200) {
          var response = httpRequest.responseText;
          var result = document.querySelector('#result');
          result.innerHTML = response;
        } else {
          alert('There was a problem with the request.');
        }
      }
    } 
 
  };*/
  
$(document).ready(function() {
var saveBttn= $('#saveBttn');

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
    }).fail(function() {
    alert('There was a problem with the request.');
    });

})
});






