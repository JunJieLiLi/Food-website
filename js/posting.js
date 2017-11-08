var num_i =3;
var num_s =3;
function addStep(){
	num_s+=1;
	var area= document.getElementById("step-area");
	var newp = document.createElement('p');
	var newstep = "Step" + num_s;
	var newnode = document.createTextNode(newstep);
	newp.appendChild(newnode);
	var newbox = document.createElement("textarea");
	newbox.rows = '5';
	newbox.cols = '100';
	newbox.name = newstep;	
	//var text ="<p>Step" + num_s +"</p>"+"<textarea name=\"step"+num_s+"\" rows=\"5\" cols=\"100\"/></textarea>";
	area.appendChild(newp);
	area.appendChild(newbox);
}

function addIngrd(){
	num_i+=1;
	var area= document.getElementById("ingrd-area");
	var newIngrd_t = "ingrd-t" + num_i;
	var t = document.createElement("INPUT");
	t.setAttribute("type", "text");
	t.size = '60';
	t.name = newIngrd_t;
	area.appendChild(t);
	
	var newIngrd_m = "ingrd-m" + num_i;
	var m = document.createElement("INPUT");
	m.setAttribute("type", "text");
	m.size = '30';
	m.name = newIngrd_m;
	area.appendChild(m);
	area.appendChild(document.createElement("br"));
}
function removeStep(){
	var area= document.getElementById("step-area");
	area.removeChild(area.lastElementChild);
	area.removeChild(area.lastElementChild);
	num_s-=1;
}
function removeIngrd(){
	var area= document.getElementById("ingrd-area");
	area.removeChild(area.lastElementChild);
	area.removeChild(area.lastElementChild);
	area.removeChild(area.lastElementChild);
	num_i-=1;
}