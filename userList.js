window.onload=function(){
    var httpRequest;
  
    httpRequest = new XMLHttpRequest();
    var url = "userList.php";
    httpRequest.onreadystatechange=load;
    httpRequest.open('GET',url);
    httpRequest.send();


    function load(){
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
            var location = httpRequest.responseText;
            var result = document.querySelector('#userList');
            result.innerHTML = location;
            } else {
            alert("Error with the request.");
            }
        }
    }
};
