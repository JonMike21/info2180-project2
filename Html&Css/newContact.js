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
        
        }).fail(function() {
            alert('There was a problem with the request.');
        });
    
    })
    });