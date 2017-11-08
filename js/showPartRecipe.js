function showPartRecipe(page_number) {
  if (page_number==0) { 
    document.getElementById("content-partRecipes").innerHTML="";
    document.getElementById("content-partRecipes").style.border="0px";
    return;
  }else if(page_number>0){
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("content-partRecipes").innerHTML=xmlhttp.responseText;
      document.getElementById("content-partRecipes").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","includes/showPartRecipe.php?q="+page_number.toString(),true);
  xmlhttp.send();
}
}

function showIngrd(ingrd){
	document.getElementById('').innerHTML=ingrd;
}