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
			
			formularz='<form method="post">Nazwa playlisty: <input type="text" name="nazwa" class="playlista"><br>Opis:<input type="text" name="opis" class="playlistaOpis"><br>Stan:<input type="text" name="stan" class="playlista"><br>Link:<input type="text" name="link" class="playlista"><br><input type="submit" value="dodaj" class="playlista"></form>';
			document.getElementById("opcje").innerHTML = formularz;
		}
		function szukaj(){
			formularz='SZUKAJ<form method="post">Nazwa Playlisty: <input type="text" name="szukanaNazwa"><br><input type="submit" value="szukaj"></form>';
			
			document.getElementById("opcje").innerHTML = formularz;
		}
		function Edytuj(){
			
			formularz='Zmień<form method="post"><input type="hidden" name="idSerii" value="'+id+'">Nazwa Playlisty: <input type="text" name="nowaNazwa" class="playlista" value="'+nazwaPlaylisty+'"><br>Opis:<input type="text" name="nowyOpis" class="playlistaOpis" value="'+opisPlaylisty+'"><br>Stan:<input type="text" name="nowyStanPlalisty" class="playlista" value="'+stanPlalisty+'"><br>Link:<input type="text" name="nowyLinkDoPlaylista" class="playlista" value="'+linkDoPlalusty+'"><br><input type="submit" value="edytuj" class="playlista"></form>'
			
			document.getElementById("opcje").innerHTML = formularz;
		}
		function Usun(){
			formularz='<form method="post"><input type="hidden" name="idSeriiDoUsuniecia" value="'+id+'"><input type="submit" value="usun" class="playlista"></form>'
			document.getElementById("opcje").innerHTML = formularz;
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
	

		<button onclick="dodaj()">dodaj</button>
		<button onclick="szukaj()">Szukaj</button>
		<div id="opcje"></div>
		<?php
			
			
			
			if(isset($_POST['nazwa'])){
				
				$nazwa=$_POST['nazwa'];
				$opis=$_POST['opis'];
				$stan=$_POST['stan'];
				$link=$_POST['link'];
				if($nazwa==NULL){
					echo "Nie dodano nazwa!";
				}elseif($opis==NULL){
					echo "nie dodano opisu!";
				}elseif($stan==NULL){
					echo "nie dodano stanu serii!";
				}elseif($link==NULL){
					echo "nie dodano linku!";
				}else{
					$wynik=$polaczenie->query("SELECT Id FROM serie WHERE nazwa='$nazwa'");
					if(!$wynik) throw new Exception($polaczenie->error);
					$ilosc=$wynik->num_rows;
					if($ilosc>=1){
						echo "Juz jest ta nazwa!";
					}else{
							
						if($polaczenie->query("INSERT INTO serie VALUES (NULL, '$nazwa','$opis', '$link', '$stan')")){
							echo "dodano playlistę";
						}else{
							throw new Exception($polaczenie->error);	
						}
					}
				}
				
			}elseif(isset($_POST['szukanaNazwa'])){
				$szukaniaNazwa=$_POST['szukanaNazwa'];
				if($szukaniaNazwa==NULL){
					echo "nie wpisania tytułu";
				}else{
					$wynik=$polaczenie->query("SELECT * FROM serie WHERE nazwa='$szukaniaNazwa'");
					if(!$wynik) throw new Exception($polaczenie->error);
					$ilosc=$wynik->num_rows;
					if($ilosc==0){
						echo "Nie ma żadnego wyniku!";
					}else{
						while($row=$wynik->fetch_assoc()){
							$id=$row['Id'];
							$nazwaPlaylisty=$row['Nazwa'];
							$opisPlaylisty=$row['Opis'];
							$linkDoPlalusty=$row['Link'];
							$stanPlalisty=$row['Stan'];
							echo"<script>
							var id=$id;
							var nazwaPlaylisty=new String('$nazwaPlaylisty');
							var opisPlaylisty=new String('$opisPlaylisty');
							var linkDoPlalusty=new String('$linkDoPlalusty');
							var stanPlalisty=new String('$stanPlalisty');
							</script>";
							echo "| $id | $nazwaPlaylisty | $opisPlaylisty | $linkDoPlalusty | $stanPlalisty | <button onclick='Edytuj()'>Edytuj</button>| <button onclick='Usun()'>Usuń</button>";
						}
					}
				}
			}elseif(isset($_POST['nowaNazwa'])){
				$id=$_POST['idSerii'];
				$nowaNazwa=$_POST['nowaNazwa'];
				$nowyOpis=$_POST['nowyOpis'];
				$nowyStanPlalisty=$_POST['nowyStanPlalisty'];
				$nowyLinkDoPlaylista=$_POST['nowyLinkDoPlaylista'];
				if($nowaNazwa==NULL){
					echo "Nie dodano nazwa!";
				}elseif($nowyOpis==NULL){
					echo "nie dodano opisu!";
				}elseif($nowyStanPlalisty==NULL){
					echo "nie dodano stanu serii!";
				}elseif($nowyLinkDoPlaylista==NULL){
					echo "nie dodano linku!";
				}else{
					$wynik=$polaczenie->query("SELECT Id FROM serie WHERE Id='$id'");
					if(!$wynik) throw new Exception($polaczenie->error);
					$ilosc=$wynik->num_rows;
					if($ilosc==0){
						echo "Bład! Nie można zmienić playlisty.";
					}else{
						if($polaczenie->query("UPDATE serie SET Nazwa='$nowaNazwa', Opis='$nowyOpis', Link='$nowyLinkDoPlaylista', Stan='$nowyStanPlalisty'  WHERE Id='$id'")){
							echo "udało się";
						}else{
							echo "nie udalo się zmienić";
						}
						
					}
				}
			}elseif(isset($_POST['idSeriiDoUsuniecia'])){
				$id=$_POST['idSeriiDoUsuniecia'];
				$wynik=$polaczenie->query("SELECT Id FROM serie WHERE Id='$id'");
				if(!$wynik) throw new Exception($polaczenie->error);
				$ilosc=$wynik->num_rows;
				if($ilosc==0){
					echo "Bład! Nie można zmienić playlisty.";
				}else{
					if($polaczenie->query("DELETE FROM serie WHERE Id='$id'")){
						echo "usunięta playlista z baza!";
					}else{
						echo "nie udało się usunąć plalisty z bazy!";
					}
					
				}
			}
			
		?>

	
	</div>
	<div id="stopka">
	Tytan96 - Youtuber &copy; Wszelkie prawa zastrzeżonie. &copy;
	
	</div>
	


	</div>
</body>
</html>