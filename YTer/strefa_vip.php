<?php

	session_start();
	
	if(!isset($_SESSION['zalogowany'])){
		header('Location: VIP.php');
		exit();
	}
	
?>


<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Tytan96</title>
	<meta name="discripton" content="Strona Youtubera Tytana96, gdzie będą aktualnie serie, planach oraz moich planach dotyczących przyszłych seriach" />
	<meta name="keywords" content="Tytan96" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="author" content="Maciej Pestka" />
	<link rel="stylesheet" href="style.css" type="text/css" />
	<script type="text/javascript" src="zegar.js"> </script>
</head>
<body onload="odliczanie();">
	<div id="strona">
	<div id="baner">
	</div>
	<div id="menu_up">
	<div class="link_up">Strona Główna</div>
	<div class="link_up">Serie</div>
	<div class="link_up">O mnie</div>
	<div class="link_up">Filmiki</div>
	<div class="link_up">Kalenedarz</div>
	<a href="VIP.php"><div class="link_up">Strefa VIP</div></a>
	<div id="zegar"></div>
	<div class="reset"></div></div>
	<div id="menu_l">
	<div class="link_l">Strona Główna</div>
	<div class="link_l">Serie</div>
	<div class="link_l">O mnie</div>
	<div class="link_l">Filmiki</div>
	<div class="link_l">Kalenedarz</div></div>
	<div id="tresc">
	
	<?php
		echo $_SESSION['login'];
		echo "<br />";
		if($_SESSION['admin']==1){
			echo "admin <br />";
			echo '<a href="panelAdmin.php">Panel Admina</a> <br>';
		}
		
		echo '[<a href="loqout.php">Wyloguj się!</a>]';
	
	?>
	</div>
	<div id="stopka">
	Wszelkie prawa zastrzeżonie. 
	
	</div>
	


	</div>
</body>
</html>