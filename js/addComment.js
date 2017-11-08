window.addEventListener('load', function(evt){addComment(evt)}, false);	

function addComment(evt) {
	//document.getElementById("commentarea").innerHTML = "adding comment";
    var addcom = document.getElementById( 'commentform' );
    addcom.addEventListener('submit', function( evt ) {
        evt.preventDefault();
		var content = document.getElementById("com_content").value;
		var article_id = document.getElementById('inv_article_id').value;
        var query = "q=c&article_id="+article_id+"&com_content="+content; 
        // get an AJAX object
        var xhr = new XMLHttpRequest();
        xhr.open('POST', "includes/add_comment.php", true );
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById("commentarea").innerHTML = xhr.responseText;
            }
            else {
                result.value = "Unknown ERROR";
            }
        };
        xhr.send( query );
	}, false );
}	

// start the setup after the page loads	
