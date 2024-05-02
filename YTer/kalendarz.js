
	var rok=obecnyRok;
	var miesiac=obecnyMiesiac-1;
	var dzien=obecnyDzien;
	
	var data=new Date(obecnyRok,obecnyMiesiac--,obecnyDzien);
	var obecnyDzienTygodnia =data.getDay();
	var iloscDniWMiesiacu = new Array(12);
	var poprzedniMiesiac;
	var ustawienie =0;
	var numerTygodnia;
	var obecnyNumerTygodnia;
	var przesuniecie=0;
	var wartoscPomoc=przesuniecie;
	
	iloscDniWMiesiacu[0]=31; // styczeń
	iloscDniWMiesiacu[2]=31; // marzec
	iloscDniWMiesiacu[3]=30; //kwiecień
	iloscDniWMiesiacu[4]=31; // maj
	iloscDniWMiesiacu[5]=30; //czerwiec
	iloscDniWMiesiacu[6]=31; //lipiec
	iloscDniWMiesiacu[7]=31;  //sierpień
	iloscDniWMiesiacu[8]=30; //wrzesień
	iloscDniWMiesiacu[9]=31; // pażdziernik
	iloscDniWMiesiacu[10]=30; // listopad
	iloscDniWMiesiacu[11]=31; // grudzień
	
	var nazwaTygodnia = new Array(7);
	nazwaTygodnia[0]="niedziela";
	nazwaTygodnia[1]="poniedziałek";
	nazwaTygodnia[2]="wtorek";
	nazwaTygodnia[3]="środa";
	nazwaTygodnia[4]="czwartek";
	nazwaTygodnia[5]="piątek";
	nazwaTygodnia[6]="sobota";
	
	var  nazwaMiesiaca = new Array(12);
	nazwaMiesiaca[0]="Styczeń";
	nazwaMiesiaca[1]="Luty";
	nazwaMiesiaca[2]="Marzec";
	nazwaMiesiaca[3]="Kwiecień";
	nazwaMiesiaca[4]="Maj";
	nazwaMiesiaca[5]="Czerwiec";
	nazwaMiesiaca[6]="Lipiec";
	nazwaMiesiaca[7]="Sierpień";
	nazwaMiesiaca[8]="Wrzesień";
	nazwaMiesiaca[9]="Październik";
	nazwaMiesiaca[10]="Listopad";
	nazwaMiesiaca[11]="Grudzień";
	var ileDniMineloOdPoczatkuRokuDlaDanegoMiesiaca=new Array(12);
	ileDniMineloOdPoczatkuRokuDlaDanegoMiesiaca[0]=0;
	ileDniMineloOdPoczatkuRokuDlaDanegoMiesiaca[1]=31;
	ileDniMineloOdPoczatkuRokuDlaDanegoMiesiaca[2]=59;
	ileDniMineloOdPoczatkuRokuDlaDanegoMiesiaca[3]=90;
	ileDniMineloOdPoczatkuRokuDlaDanegoMiesiaca[4]=120;
	ileDniMineloOdPoczatkuRokuDlaDanegoMiesiaca[5]=151;
	ileDniMineloOdPoczatkuRokuDlaDanegoMiesiaca[6]=181;
	ileDniMineloOdPoczatkuRokuDlaDanegoMiesiaca[7]=212;
	ileDniMineloOdPoczatkuRokuDlaDanegoMiesiaca[8]=243;
	ileDniMineloOdPoczatkuRokuDlaDanegoMiesiaca[9]=273;
	ileDniMineloOdPoczatkuRokuDlaDanegoMiesiaca[10]=304;
	ileDniMineloOdPoczatkuRokuDlaDanegoMiesiaca[11]=334;
	liczeniaTygodnia();
	sprawdczenieCzyRokJestPrzestepny();
	kalendarz();
function kalendarz(){
	
	odliczanie(); //w funckji musi się znajdować. Jak w funckji nie znajduje się to nie ma zegaru na stronie
	
	if(ustawienie==0){
		pokazWidokMiesiaca();
	}else if(ustawienie==1){
		pokazWidokTygodnia();
	}else if(ustawienie==2){
		pokazWydokDnia()
	} 
}
function sprawdczenieCzyRokJestPrzestepny(){
	if(rok%4==0 && rok%100!=0){
		iloscDniWMiesiacu[1]=29;
	}else if(rok%400==0){
		iloscDniWMiesiacu[1]=29;
	}else{
		iloscDniWMiesiacu[1]=28;	
	}
}
function liczeniaTygodnia(){
	var dataUstawionaNaCzwartyStycnia=new Date(rok,0,4);
	var dzienCzwartegoStycnia=dataUstawionaNaCzwartyStycnia.getDay();
	obecnyNumerTygodnia=(ileDniMineloOdPoczatkuRokuDlaDanegoMiesiaca[obecnyMiesiac]+dzien)/7;
	
}
function pokazWidokMiesiaca(){
	var Data1= new Date(rok,miesiac,1);
	var priewszy=Data1.getDay();
	var Data2= new Date(rok,miesiac,iloscDniWMiesiacu[miesiac]);
	var ostatni=Data2.getDay();
	var dni;
	if(miesiac==0){
		poprzedniMiesiac=11;
	}else{
		poprzedniMiesiac=miesiac-1;
	}
	var kartkaKalendarza = "";
	kartkaKalendarza+='<table id="cal"><tr><th class="nazwadnia">Poniedziałek</th><th class="nazwadnia">Wtorek</th><th class="nazwadnia">Środa</th><th class="nazwadnia">Czwartek</th><th class="nazwadnia">Piątek</th><th class="nazwadnia">Sobota</th><th class="nazwadnia">Niedziela</th></tr><tr>';
	document.getElementById("name").innerHTML =nazwaMiesiaca[miesiac]+" "+rok;
	if(priewszy==0){
		for(i=5;i>=0;i--){
			dni=iloscDniWMiesiacu[poprzedniMiesiac]-i;
			kartkaKalendarza+='<th class="stare">'+dni+'</th>';
		}
	}else if(priewszy==2){
		dni=iloscDniWMiesiacu[poprzedniMiesiac];
		kartkaKalendarza+='<th class="stare">'+dni+'</th>';
			
	}else if(priewszy==3){
		for(i=1;i>=0;i--){
			dni=iloscDniWMiesiacu[poprzedniMiesiac]-i;
			kartkaKalendarza+='<th class="stare">'+dni+'</th>';
		}
	}else if(priewszy==4){
		for(i=2;i>=0;i--){
			dni=iloscDniWMiesiacu[poprzedniMiesiac]-i;
			kartkaKalendarza+='<th class="stare">'+dni+'</th>';
		}
	}else if(priewszy==5){
		for(i=3;i>=0;i--){
			dni=iloscDniWMiesiacu[poprzedniMiesiac]-i;
			kartkaKalendarza+='<th class="stare">'+dni+'</th>';
		}
	}else if(priewszy==6){
		for(i=4;i>=0;i--){
			dni=iloscDniWMiesiacu[poprzedniMiesiac]-i;
			kartkaKalendarza+='<th class="stare">'+dni+'</th>';	
		}
	}
	for(i=1; i<=iloscDniWMiesiacu[miesiac];i++){
		priewszy++;
		if(dzien==i && rok==obecnyRok && miesiac==(obecnyMiesiac)){
			kartkaKalendarza+='<th class="teraz" id="obecnyDzien">'+i+'<div class="odcinekWKalendarzu">odcinek 1</div><div  class="odcinekWKalendarzu">odcinek 2</div><div  class="odcinekWKalendarzu">odcinek 3</div></th>';
			
		}else{
			kartkaKalendarza+='<th class="teraz">'+i+'<div  class="odcinekWKalendarzu">odcinek 1</div><div class="odcinekWKalendarzu">odcinek 2</div></th>';
		}
		if(priewszy%7==1){kartkaKalendarza+='<tr></th>';}
			
	}
	if(ostatni==0){
		for(i=1;i<=7;i++){
			kartkaKalendarza+='<th class="nowe">'+i+'</th>';
		}
	}else if(ostatni==1){
		for(i=1;i<=6;i++){
			kartkaKalendarza+='<th  class="nowe">'+i+'</th>';
		}
	}else if(ostatni==2){
		for(i=1;i<=5;i++){
			kartkaKalendarza+='<th class="nowe">'+i+'</th>';
		}
	}else if(ostatni==3){
		for(i=1;i<=4;i++){
			kartkaKalendarza+='<th class="nowe">'+i+'</th>';
		}
	}else if(ostatni==4){
		for(i=1;i<=3;i++){
			kartkaKalendarza+='<th class="nowe">'+i+'</th>';
		}
	}else if(ostatni==5){
		for(i=1;i<=2;i++){
			kartkaKalendarza+='<th class="nowe">'+i+'</th>';
		}
	}else if(ostatni==6){
		kartkaKalendarza+='<th class="nowe">1</th>';	
	}
	kartkaKalendarza+='</tr></table>';
	document.getElementById("dniowe").innerHTML =kartkaKalendarza;
}
function pokazWidokTygodnia(){
	
	
	var poprzedniMiesiac;
	if(miesiac==0){
		poprzedniMiesiac=11;
	}else{
		poprzedniMiesiac=miesiac-1;
	}
	var pomocznyDzien;
	var kartkaKalendarza = "";
	kartkaKalendarza+='<table id="cal"><tr><th class="nazwadnia">Poniedziałek</th><th class="nazwadnia">Wtorek</th><th class="nazwadnia">Środa</th><th class="nazwadnia">Czwartek</th><th class="nazwadnia">Piątek</th><th class="nazwadnia">Sobota</th><th class="nazwadnia">Niedziela</th></tr><tr>';
	document.getElementById("name").innerHTML ="tydzien "+numerTygodnia;
	
	if(obecnyDzienTygodnia==0){
		pomocznyDzien=dzien-7;
	}else{
		pomocznyDzien=dzien-obecnyDzienTygodnia;
	}
	if(pomocznyDzien<=0){
		pomocznyDzien=iloscDniWMiesiacu[poprzedniMiesiac]+pomocznyDzien;
	}
	for(i=0;i<7;++i){
		if(pomocznyDzien>=iloscDniWMiesiacu[poprzedniMiesiac]){
			pomocznyDzien=0;
		}
		pomocznyDzien++;
		kartkaKalendarza+='<th class="teraz">'+pomocznyDzien+'</th>';
	}
	
	
	kartkaKalendarza+='</tr></table>';
	document.getElementById("dniowe").innerHTML =kartkaKalendarza;
}
function pokazWydokDnia(){
	var kartkaKalendarza="";
	document.getElementById("name").innerHTML =rok+' '+(miesiac+1)+' '+dzien;
	kartkaKalendarza+='<table id="cal"><tr><th class="nazwadnia">'+nazwaTygodnia[obecnyDzienTygodnia]+'</th></tr><tr>'
	kartkaKalendarza+='<th class="teraz">'+dzien+'</th>';
	kartkaKalendarza+='</tr></table>';
	document.getElementById("dniowe").innerHTML =kartkaKalendarza;
	
}
function dalej(){
	var dzionek;
	if(ustawienie==0){
		miesiac = miesiac + 1;
		if(miesiac==12){
			miesiac=0;
			rok=rok+1;
		}
		
	}else if(ustawienie==1){
		numerTygodnia++;
		dzien=dzien+7;
		dzionek=dzien;
		if(obecnyDzienTygodnia==1){
			dzionek=dzien+6;
		}else if(obecnyDzienTygodnia==2){
			dzionek=dzien+5;
		}else if(obecnyDzienTygodnia==3){
			dzionek=dzien+4;
		}else if(obecnyDzienTygodnia==4){
			dzienek=dzien+3;
		}else if(obecnyDzienTygodnia==5){
			dzionek=dzien+2;
		}else if(obecnyDzienTygodnia==6){
			dzionek=dzien+1;
		}
		
		if(dzionek>=iloscDniWMiesiacu[miesiac]){
			dzien=dzien-iloscDniWMiesiacu[miesiac];
			miesiac++;
		}
		if(numerTygodnia==53){
			numerTygodnia=1;
			rok++;
		}
		
	}
	kalendarz();
	
}
function cofnij(){
	if(ustawienie==0){
		miesiac = miesiac - 1;
		if(miesiac==-1){
			miesiac=11;
			rok=rok-1;	
		}
		
	}else if(ustawienie==1){
		numerTygodnia--;
		dzien=dzien-7;
		if(dzien<=0){
			dzien=iloscDniWMiesiacu[poprzedniMiesiac]+dzien;
			miesiac--;
			if(miesiac<0){
				miesiac=11;
			}
		}
		if(numerTygodnia==0){
			numerTygodnia=52;
			rok--;
		}
	}
	
	kalendarz();
	
}
function miesiac1(){
	
	ustawienie=0;
	kalendarz();
	
}
function tydzien(){
	
	ustawienie=1;
	numerTygodnia=obecnyNumerTygodnia;
	kalendarz();
}
function dzien1(){
	
	ustawienie=2;
	kalendarz();
}

