var num=2;
var myVar = setInterval(function(){ sendrequest(1) }, 3000);
function sendrequest(value) {
		num = num+parseInt(value);
		if (num>7){ num=2;}
		if (num<2) { num=7;}
	   var url = "slider-process.php?values="+ num;
        // get an AJAX object
        var xhr = new XMLHttpRequest();
        xhr.open('GET', url, true );
	    xhr.onreadystatechange = function() {
            if ( xhr.readyState != 4) return;
            if ( xhr.status == 200 || xhr.status == 400) {
			
				displayResult(xhr);
          }
        };
        xhr.send( null );
    } 
	
	function displayResult( req ) {
	var elem= document.getElementById("slider");
	var sliderlink=document.getElementById("slider-link");
	var a = req.responseText;
	var r=a.split("<br>");
	 elem.setAttribute("src", "images/upload/"+r[1]);
	 //alert(r[0]);
	sliderlink.setAttribute("href", r[0]);
}
