jQuery(document).ready(function(){

	var wilaya;
	$.getJSON("js/wilaya.json", function(data) { 
		wilaya=data;
	});
	
	// pour update commun
	$("#wilaya").change(function(){
		$("#commune").html('');
		var e = document.getElementById("wilaya");
		var strUser = e.options[e.selectedIndex].value;	

		switch(strUser)
		{
			case '':{liste=[""];break;}
			case '1':{liste=wilaya.wilaya1;break;}
			case '2':{liste=wilaya.wilaya2;break;}
			case '3':{liste=wilaya.wilaya3;break;}
			case '4':{liste=wilaya.wilaya4;break;}
			case '5':{liste=wilaya.wilaya5;break;}
			case '6':{liste=wilaya.wilaya6;break;}
			case '7':{liste=wilaya.wilaya7;break;}
			case '8':{liste=wilaya.wilaya8;break;}
			case '9':{liste=wilaya.wilaya9;break;}
			case '10':{liste=wilaya.wilaya10;break;}
			case '11':{liste=wilaya.wilaya11;break;}
			case '12':{liste=wilaya.wilaya12;break;}
			case '13':{liste=wilaya.wilaya13;break;}
			case '14':{liste=wilaya.wilaya14;break;}
			case '15':{liste=wilaya.wilaya15;break;}
			case '16':{liste=wilaya.wilaya16;break;}
			case '17':{liste=wilaya.wilaya17;break;}
			case '18':{liste=wilaya.wilaya18;break;}
			case '19':{liste=wilaya.wilaya19;break;}
			case '20':{liste=wilaya.wilaya20;break;}
			case '21':{liste=wilaya.wilaya21;break;}
			case '22':{liste=wilaya.wilaya22;break;}
			case '23':{liste=wilaya.wilaya23;break;}
			case '24':{liste=wilaya.wilaya24;break;}
			case '25':{liste=wilaya.wilaya25;break;}
			case '26':{liste=wilaya.wilaya26;break;}
			case '27':{liste=wilaya.wilaya27;break;}
			case '28':{liste=wilaya.wilaya28;break;}
			case '29':{liste=wilaya.wilaya29;break;}
			case '30':{liste=wilaya.wilaya30;break;}
			case '31':{liste=wilaya.wilaya31;break;}
			case '32':{liste=wilaya.wilaya32;break;}
			case '33':{liste=wilaya.wilaya33;break;}
			case '34':{liste=wilaya.wilaya34;break;}
			case '35':{liste=wilaya.wilaya35;break;}
			case '36':{liste=wilaya.wilaya36;break;}
			case '37':{liste=wilaya.wilaya37;break;}
			case '38':{liste=wilaya.wilaya38;break;}
			case '39':{liste=wilaya.wilaya39;break;}
			case '40':{liste=wilaya.wilaya40;break;}
			case '41':{liste=wilaya.wilaya41;break;}
			case '42':{liste=wilaya.wilaya42;break;}
			case '43':{liste=wilaya.wilaya43;break;}
			case '44':{liste=wilaya.wilaya44;break;}
			case '45':{liste=wilaya.wilaya45;break;}
			case '46':{liste=wilaya.wilaya46;break;}
			case '47':{liste=wilaya.wilaya47;break;}
			case '48':{liste=wilaya.wilaya48;break;}
		}

		var i=0;
		var j= 0;
		var textt = document.createTextNode("Veuillez choisir votre commune");
		var selected =  document.createElement('option');
		selected.value = "";
		selected.appendChild(textt);
		document.getElementById('commune').appendChild(selected);
			
		while(i<liste.length)
		{
			j=i+1;
			var textt = document.createTextNode(liste[i]);
			var selected =  document.createElement('option');
			selected.value = j;
			selected.appendChild(textt);
			document.getElementById('commune').appendChild(selected);
			i++;
		}
	});

});
