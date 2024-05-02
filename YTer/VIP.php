<?php

	session_start();
	
	if((isset($_SESSION['zalogowany'])) &&($_SESSION['zalogowany']==true)){
		
		header('Location: strefa_vip.php');
		exit();
		
	}
	if (isset($_POST['email'])){
		
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
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	
 </script>
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
	
	<h3>Masz SUBA? To zapraszam!</h3>
	<div id="formularz">
	<form action="zaloguj.php" method="post">
	Login:
	<input type="text" name="login" placeholder="login" class="logowanie">
	
	Hasło:
	<input type="password" name="haslo" placeholder="haslo" class="logowanie">
	
	<input type="submit" value="zaloguj się">
	<?php
		if(isset($_SESSION['blad']))	echo $_SESSION['blad']; unset ($_SESSION['blad']);
	?>
	</form></div>
	<a href="rejestracja.php">Nie masz konta! </a>
	</div>
	<div id="stopka">
	Wszelkie prawa zastrzeżonie. 
	
	</div>
	


	</div>
</body>
</html>