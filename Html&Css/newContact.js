$(document).ready(function() {
    var saveBttn= $('#btn-save');
    
    saveBttn.on('click', function(element) {
        element.preventDefault();
        var title = $('#title').val();
        var firstName = $('#fname').val();
        var lastName = $('#lname').val();
        var email = $('#email').val();
        var telephone = $('#tel').val();
        var company = $('#company').val();
        var type = $('#type').val();
        var assigned = $('#assign').val();
    
        if (title && (firstName || firstName === " ") && (lastName || lastName === " ") && (email || email === " ") && telephone && (company || company === " ") && type && assigned){
            $.ajax('newContact.php', {
                method: 'POST',
                data: {
                    title: title,
                    fname: firstName,
                    lname: lastName,
                    email: email,
                    tel: telephone,
                    company: company,
                    type: type,
                    assign: assigned
                }
        
                }).done(function(response) {
                    var resp = response;
                    $('#result').html(resp);
                    
                    setTimeout(function() {             
                        window.open("dashboard.html");  
                    }, 2000);
                    
                
                }).fail(function() {
                    alert('There was a problem with the request.');
                });
        }else{
            alert('Empty Field(s) Detected.');
        }
    
    })
});

window.onload=function(){
    var httpRequest;
    
    httpRequest = new XMLHttpRequest();
    var url = "newContact.php";
    httpRequest.onreadystatechange=load;
    httpRequest.open('GET',url);
    httpRequest.send();
   

    function load(){
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
            var location = httpRequest.responseText;
            var result = document.querySelector('#dropDownValue');
            result.innerHTML = location;

        
        
        } else {
                alert("Error with the GET request.");
            }
        }
    }
};

