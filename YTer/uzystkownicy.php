<?php

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
	<div id="menu_l">q
	<a href="index.php"><div class="link_l">Strona Główna</div></a>
	<a href="serie.php"><div class="link_l">Serie</div></a>
	<a href="O_mnie.php"><div class="link_l">O mnie</div></a>
	<a href="Filmiki.php"><div class="link_l">Filmiki</div></a>
	<a href="kalendarz.php"><div class="link_l">Kalenedarz</div></a></div>
	<div id="tresc">
		Wyszukaj użytkownika: <br>
		<form method="post">
		<input type="text" name="wyszukaj"><br>
		<input type="submit" value="szukaj">
		</form>
		<?php
			$szukaj=$_POST['wyszukaj'];
			require_once "connect.php";
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			echo '<table><tr><th>Id</th><th>Login</th><th>email</th><th>załozenie konta</th>';
			$wynik=$polaczenie->query(sprintf("SELECT * FROM user WHERE login='%s'", mysqli_real_escape_string($polaczenie,$szukaj)));
			
			$ilosc_kont=$wynik->num_rows;
			
			for($numer=0; $numer<$ilosc_kont;$numer++){
				
				$wiersz=mysqli_fetch_assoc($wynik);
				$id=$wiersz['ID_user'];
				$login=$wiersz['login'];
				$email=$wiersz['email'];
				echo "<tr><th>$id</th><th>$login</th><th>$email</th><th>załozenie konta</th>";
				
			}
			echo '</table>';
			echo $ilosc_kont;
			echo $szukaj;
			

		?>
	</div>
	<div id="stopka">
	Tytan96 - Youtuber &copy; Wszelkie prawa zastrzeżonie. &copy;
	
	</div>
	


	</div>
</body>
</html>