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
                    assign: assigned,
                    async:true,
                    dataType : 'jsonp',
                    crossDomain:true
                }
        
                }).done(function(response) {
                    var resp = response;
                    $('#result').html(resp);
                
                }).fail(function() {
                    alert('There was a problem with the request.');
                });
        }else{
            alert('Empty Field(s) Detected.');
        }
       
    
    })
    });