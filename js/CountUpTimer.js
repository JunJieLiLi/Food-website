function startCountUp() {
  upTime(Date()); 
}
function upTime(countTo) {
  now = new Date();
  countTo = new Date(countTo);
  difference = (now-countTo);

  days=Math.floor(difference/(60*60*1000*24)*1);
  hours=Math.floor((difference%(60*60*1000*24))/(60*60*1000)*1);
  mins=Math.floor(((difference%(60*60*1000*24))%(60*60*1000))/(60*1000)*1);
  secs=Math.floor((((difference%(60*60*1000*24))%(60*60*1000))%(60*1000))/1000*1);

  document.getElementById('days').innerHTML = days;
  document.getElementById('hours').innerHTML = hours;
  document.getElementById('minutes').innerHTML = mins;
  document.getElementById('seconds').innerHTML = secs;
  
  
  if(secs==1){arr = document.getElementsByClassName("timeRefSeconds");
  for (i = 0; i < arr.length; i++) { 
  document.getElementById('stopTimer').style.visibility = "visible";
  document.getElementById('submitTime').style.visibility = "visible";
    arr[i] .style.visibility='visible';
  }}
  
  
  if(mins==1){
  arr = document.getElementsByClassName("timeRefMinutes");
  arr[1].innerHTML = "minutes";
  for (i = 0; i < arr.length; i++) { 
    arr[i] .style.visibility='visible';
  }}
  
  if(hours==1){
  arr = document.getElementsByClassName("timeRefHours");
  arr[1].innerHTML = "hours";
  for (i = 0; i < arr.length; i++) { 
    arr[i] .style.visibility='visible';
  }}
  
  if(days==1){
  arr = document.getElementsByClassName("timeRefDays");
  arr[1].innerHTML = "days";
  for (i = 0; i < arr.length; i++) { 
    arr[i] .style.visibility='visible';
  }}

  clearTimeout(upTime.to);
  upTime.to=setTimeout(function(){ upTime(countTo); },1000);
}
function stopCountUp() {
  // Month,Day,Year,Hour,Minute,Second
  clearTimeout(upTime.to); // ****** Change this line!
}

function submitTime(){
	d = parseInt( document.getElementById('days').innerHTML);
	h = parseInt(document.getElementById('hours').innerHTML);
	m = parseInt(document.getElementById('minutes').innerHTML);
	s = parseInt(document.getElementById('seconds').innerHTML);
	time = ((24*d+h)*60+m)*60+s;
	article_id = document.getElementById('article_id').innerHTML;
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("countup").innerHTML=xmlhttp.responseText;
      
    }
  }
  xmlhttp.open("GET","includes/storeCookingTime.php?q="+time+"&id="+article_id,true);
  xmlhttp.send();
  }