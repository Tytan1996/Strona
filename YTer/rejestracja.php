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
	<div id="menu_l">
	<a href="index.php"><div class="link_l">Strona Główna</div></a>
	<a href="serie.php"><div class="link_l">Serie</div></a>
	<a href="O_mnie.php"><div class="link_l">O mnie</div></a>
	<a href="Filmiki.php"><div class="link_l">Filmiki</div></a>
	<a href="kalendarz.php"><div class="link_l">Kalenedarz</div></a></div>
	<div id="tresc">
	
	
	Utwórz konto:
	<form action="nowekonto.php" method="post">
	Login:<br>
	<input type="text" name="login"><br>
	<?php
		if(isset($_SESSION['bnick']))echo $_SESSION['bnick']; unset ($_SESSION['bnick']);
	?>
	Hasło:<br>
	<input type="password" name="haslo1"><br>
	Powtórz hasło<br>
	<input type="password" name="haslo2"><br>
	<?php
		if(isset($_SESSION['bhaslo']))echo $_SESSION['bhaslo']; unset ($_SESSION['bhaslo']);
	?>
	Email:<br>
	<input type="text" name="email"><br>
	<?php
		if(isset($_SESSION['e_email']))echo $_SESSION['e_email']; unset ($_SESSION['e_email']);
	?>
	<input type="checkbox" name="regulamin">Akceptuję regulamin
	</label><br>
	<?php
		if(isset($_SESSION['breguramin']))echo $_SESSION['breguramin']; unset ($_SESSION['breguramin']);
	?>
	<input type="submit" value="Załóż konto">
	</form>

	</div>
	<div id="stopka">
	Tytan96 - Youtuber &copy; Wszelkie prawa zastrzeżonie. &copy;
	
	</div>
	


	</div>
</body>
</html>