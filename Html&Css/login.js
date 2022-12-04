
$('input[type=submit]').on('click',function(element) {
    
    element.preventDefault();
    var loginEmail = $('input[name=loginEmail]').val();
    var loginPassword = $('input[name=loginPassword]').val();
    alert(loginEmail);
    
    $.ajax({
        type:'POST',
        URL: 'login.php',
        data: {
            email: loginEmail,
            password: loginPassword,

        }})
        .success(function(data) {
            /*console.log(data);*/
            var resp = data;
            $('#result').html(resp);
        })
        .fail(function() {
            console.log('There was a problem with the request.')
            alert('There was a problem with the request.');
        });
    
    });