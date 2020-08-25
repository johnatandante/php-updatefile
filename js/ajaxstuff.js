
function Evaluate(download=true) {
    var parameter1 = $("#myvalues").val();
    
    $.ajax({
            type: "POST",
            url: "./service.php",
            data: {
                parameter1: parameter1,
                parameter2: null
            },
            success: function (result) {
                if (result.success) {
                    $("#container").html(result.content);
                    if(download) downloadFile(result.path + "?rndm=" + Math.random());

                } else {
                    alert('something goes wrong:\n' + result.message);
                }
            },
            error: function (result) {
                alert('error: ' + result);
            }
        });
    
    
}


 function downloadFile(urlToSend) {
     var req = new XMLHttpRequest();
     req.open("GET", urlToSend, true);
     req.responseType = "blob";
     req.onload = function (event) {
         var blob = req.response;
         var fileName = req.getResponseHeader("fileName") //if you have the fileName header available
         var link=document.createElement('a');
         link.href=window.URL.createObjectURL(blob);
         link.download=fileName;
         link.click();
     };

     req.send();
 }

//$(document).ready(function () { });
