$(document).ready(function() {
    var button= $('#addNote');
    
    button.on('click', function(element) {
        element.preventDefault();
        var note = $('#textarea').val();
    
        $.ajax('note.php', {
        method: 'POST',
        data: {
         textarea: textarea,
        }
        }).done(function(response) {
        var resp = response;
        $('#result').html(resp);
        }).fail(function() {
        alert('There was a problem with the request.');
        });
    
    })
    });