window.onload=function(){
    var httpRequest;
    var All= document.querySelector("#All");
    var lookupc= document.querySelector("#lookupc");
    
    All.addEventListener('click', function(element){
        element.preventDefault();
        httpRequest = new XMLHttpRequest();
        var url = "Dashboard.php";
        httpRequest.onreadystatechange=load;
        httpRequest.open('GET',url);
        httpRequest.send();
    });

   



    function load(){
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
            var location = httpRequest.responseText;
            var result = document.querySelector('#result');
            result.innerHTML = location;
            } else {
            alert("Error with the request.");
            }
        }
    }
};

