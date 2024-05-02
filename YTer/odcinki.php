<?php

	require_once "connect.php";
	$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
	
	
	session_start();

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" >
	<title>Tytan96</title>
	<meta name="discripton" content="Strona Youtubera Tytana96, gdzie będą aktualnie serie, moich planach, lista wszystkich moich serii obecnych, skończyonych. Oraz kaledarz pojawiania się nowych odcinków oraz live." >
	<meta name="keywords" content="Tytan96" >
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="author" content="Maciej Pestka" >
	<link rel="stylesheet" href="style.css" type="text/css" >
	<script type="text/javascript" src="zegar.js"> </script>
	<script type="text/javascript">

		var formularz;
			
		function dodaj(){
			
			formularz='<form method="post">Tytuł odcinka: <input type="text" name="tytul"><br>Numer odcinka:<input type="text" name="numerOdcinka"><br>Opis:<input type="text" name="opis"><br>Link<input type="text" name="link"><br>Data Premiery: <input type="datetime-local" name="dataPremiery" ><br>Data Nagrana: <input type="datetime-local" name="dataNagrana" ><br><input list="browsers" name="Seria"><br><input type="submit" value="dodaj"></form>';
			document.getElementById("opcje").innerHTML = formularz;

		}
		function edytuj(id){
			
			document.getElementById("opcje").innerHTML = "edycja "+id;
		}
		function szukaj(){
			
			formularz='<form method="post">Szukaj odcinka: <input type="text" name="snazwa"><br><input type="submit" value="dodaj"></form>';
			
			document.getElementById("opcje").innerHTML = formularz;
			
		}
		function usun(id){
			
			php='<?php require_once "connect.php"; $polaczenie = new mysqli($host, $db_user, $db_password, $db_name); echo "jestem"; ?>';
			
			
			document.getElementById("opcje").innerHTML = php;
			
			
		}
		

	</script>
</head>
<body onload="odliczanie();">
	<div id="strona">
	<div id="baner">
	</div>
	<div id="menu_up">
	<a href="index.php"><div class="link_up">Strona Główna</div></a>
	<a href="serie.php"><div class="link_up">Serie</div></a>
	<a href="O_mnie.php"><div class="link_up">O mnie</div></a>
	<a href="Filmiki.php"><div class="link_up">Filmiki</div></a>
	<a href="kalendarz.php"><div class="link_up">Kalendarz</div></a>
	<a href="VIP.php"><div class="link_up">Strefa VIP</div></a>
	<div id="zegar"></div>
	<div class="reset"></div></div>
	<div id="menu_l">
	<a href="index.php"><div class="link_l">Strona Główna</div></a>
	<a href="serie.php"><div class="link_l">Serie</div></a>
	<a href="O_mnie.php"><div class="link_l">O mnie</div></a>
	<a href="Filmiki.php"><div class="link_l">Filmiki</div></a>
	<a href="kalendarz.php"><div class="link_l">Kalenedarz</div></a></div>
	<div id="tresc">
		


		<button onclick="dodaj()">Dodaj odcinek</button>
		<button onclick="szukaj()">Szukaj odcinek</button>
		<div id="opcje"></div>
		<?php
			if(isset($_POST['tytul'])){
				$tytul=$_POST['tytul'];
				$numerOdcinka=$_POST['numerOdcinka'];
				$opis=$_POST['opis'];
				$link=$_POST['link'];
				$dataPremiery=$_POST['dataPremiery'];
				$dataNagrana=$_POST['dataNagrana'];
				if($tytul==NULL){
					echo "nie dodanio tytułu";
				}elseif($numerOdcinka==NULL){
					echo "nie dodano numeru odcinka";
				}elseif($opis==NULL){
					echo "nie dodano opisu!";
				}elseif($link==NULL){
					echo "nie dodano linku!";
				}elseif($dataPremiery==NULL){
					echo "nie dodano daty premiery!";
				}elseif($dataNagrana==NULL){
					echo "nie dodano daty nagrana!";
				}else{
					$wynik=$polaczenie->query("SELECT Id FROM odcinki WHERE tytul='$tytul'");
					if(!$wynik) throw new Exception($polaczenie->error);
					$ilosc=$wynik->num_rows;
					if($ilosc>=1){
						echo "Juz jest taki tytuł!";
					}else{
							
						if($polaczenie->query("INSERT INTO odcinki VALUES (NULL, '$nazwa','$opis', '$link', '$stan')")){
							echo "dodano playlistę";
						}else{
							throw new Exception($polaczenie->error);	
						}
					}
				}
			}
			
			echo '<table id="lista"><tr><th>Id</th><th>Nazwa</th><th>Opis</th></table>';
		
		
		?>
	</div>
	<div id="stopka">
	Tytan96 - Youtuber &copy; Wszelkie prawa zastrzeżonie. &copy;
	
	</div>
	


	</div>
</body>
</html>