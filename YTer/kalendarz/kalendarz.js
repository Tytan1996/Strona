	

	var data1 = new Date();
	var dzien = data1.getDate();
	var miesiac = data1.getMonth();
	var rok = data1.getFullYear();
	var obecny=data1.getDay();
	var iledni = new Array(12);
	var data2;
	var data3;
	var priewszy;
	var ostatni;
	var dni;
	var ustawienie =0;
	
	iledni[0]=31; // styczeń
	iledni[2]=31; // marzec
	iledni[3]=30; //kwiecień
	iledni[4]=31; // maj
	iledni[5]=30; //czerwiec
	iledni[6]=31; //lipiec
	iledni[7]=31;  //sierpień
	iledni[8]=30; //wrzesień
	iledni[9]=31; // pażdziernik
	iledni[10]=30; // listopad
	iledni[11]=31; // grudzień
	
	var nametydzien = new Array(7);
	nametydzien[0]="niedziela";
	nametydzien[1]="poniedziałek";
	nametydzien[2]="wtorek";
	nametydzien[3]="środa";
	nametydzien[4]="czwartek";
	nametydzien[5]="piątek";
	nametydzien[6]="sobota";
	
	var  namemiesiac = new Array(12);
	namemiesiac[0]="Styczeń";
	namemiesiac[1]="Luty";
	namemiesiac[2]="Marzec";
	namemiesiac[3]="Kwiecień";
	namemiesiac[4]="Maj";
	namemiesiac[5]="Czerwiec";
	namemiesiac[6]="Lipiec";
	namemiesiac[7]="Sierpień";
	namemiesiac[8]="Wrzesień";
	namemiesiac[9]="Październik";
	namemiesiac[10]="Listopad";
	namemiesiac[11]="Grudzień";
	kalendarz();
function kalendarz(){
	
	data2 = new Date(rok, miesiac,1);
	priewszy = data2.getDay();
	data3 = new Date(rok, miesiac, iledni[miesiac]);
	ostatni= data3.getDay();
	document.getElementById("name").innerHTML =namemiesiac[miesiac]+" "+rok;
	
	if(rok%4==0 && rok%100!=0){
		iledni[1]=29;
	}else if(rok%400==0){
		iledni[1]=29;
	}else{
		iledni[1]=28;
		
	} //sprawdza czy rok jest przestępny

	var dzien12 = "";
	dzien12=dzien12+'<table id="cal"><tr><th class="nazwadnia">Poniedziałek</th><th class="nazwadnia">Wtorek</th><th class="nazwadnia">Środa</th><th class="nazwadnia">Czwartek</th><th class="nazwadnia">Piątek</th><th class="nazwadnia">Sobota</th><th class="nazwadnia">Niedziela</th></tr><tr>';
	
	if(ustawienie==0){
		if(priewszy==0){
			for(i=5;i>=0;i--){
				dni=iledni[miesiac-1]-i;
				dzien12=dzien12+'<th class="stare">'+dni+'</th>';
			}
		}else if(priewszy==2){
			dni=iledni[miesiac-1];
			dzien12=dzien12+'<th class="stare">'+dni+'</th>';
			

			
		}else if(priewszy==3){
			for(i=1;i>=0;i--){
				dni=iledni[miesiac-1]-i;
				dzien12=dzien12+'<th class="stare">'+dni+'</th>';
			}
		}else if(priewszy==4){
			for(i=2;i>=0;i--){
				dni=iledni[miesiac-1]-i;
				dzien12=dzien12+'<th class="stare">'+dni+'</th>';
			}
		}else if(priewszy==5){
			for(i=3;i>=0;i--){
				dni=iledni[miesiac-1]-i;
				dzien12=dzien12+'<th class="stare">'+dni+'</th>';
			}
		}else if(priewszy==6){
			for(i=4;i>=0;i--){
				dni=iledni[miesiac-1]-i;
				dzien12=dzien12+'<th class="stare">'+dni+'</th>';	
			}
		}
		for(i=1; i<=iledni[miesiac];i++){
			priewszy++;
			
			dzien12=dzien12+'<th class="teraz">'+i+'</th>';
			if(priewszy%7==1){dzien12=dzien12+'<tr></th>';}
			
			
		}
		if(ostatni==0){
			for(i=1;i<=7;i++){
				dzien12=dzien12+'<th class="nowe">'+i+'</th>';
			}
		}else if(ostatni==1){
			for(i=1;i<=6;i++){
				dzien12=dzien12+'<th  class="nowe">'+i+'</th>';
			}
		}else if(ostatni==2){
			for(i=1;i<=5;i++){
				dzien12=dzien12+'<th class="nowe">'+i+'</th>';
			}
		}else if(ostatni==3){
			for(i=1;i<=4;i++){
				dzien12=dzien12+'<th class="nowe">'+i+'</th>';
			}
		}else if(ostatni==4){
			for(i=1;i<=3;i++){
				dzien12=dzien12+'<th class="nowe">'+i+'</th>';
			}
		}else if(ostatni==5){
			for(i=1;i<=2;i++){
				dzien12=dzien12+'<th class="nowe">'+i+'</th>';
			}
		}else if(ostatni==6){
			dzien12=dzien12+'<th class="nowe">1</th>';
			
		}
		
		
		uzytedni=0;
	}else if(ustawienie==1){
		if(priewszy==1){
			for(i=1;i<=7;i++){
				dzien12=dzien12+'<th class="teraz">'+i+'</th>';
			}
		}
	}
	dzien12=dzien12+'</tr></table>';
	document.getElementById("dniowe").innerHTML =dzien12;
	odliczanie();
}




function dalej(){
	
	miesiac = miesiac + 1;
	if(miesiac==12){
		miesiac=0;
		rok=rok+1;
		
	}
	kalendarz();
	
	
}
function cofnij(){
	
	miesiac = miesiac - 1;
	if(miesiac==-1){
		miesiac=11;
		rok=rok-1;	
	}
	kalendarz();
	
	
}
function miesiac1(){
	
	ustawienie=0;
	kalendarz();
	
}
function tydzien(){
	
	ustawienie=1;
	kalendarz();
}
function dzien1(){
	
	ustawienie=2;
	kalendarz();
}