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
	<div class="link_up" id="up_1">Strona Główna</div>
	<div class="link_up">Serie</div>
	<div class="link_up">O mnie</div>
	<div class="link_up">Filmiki</div>
	<div class="link_up">Kalenedarz</div>
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
	
		$sub = $_POST['sub'];
		$kont= $_POST['kont'];
		$suma= 1*$sub+1.99*$kont;
		
		echo "$suma zł";
		
		
	
	?>
	<br /><br />
	Witam na stronie poświęconej o mnie, czyli w wielkim skrócie o kanale na YT.
	Tutaj znajdzieście wiele informacji o seriach obecnych, skończonych, także o tychj które próbuje w najbliższym czasie.
	Także kalendarz filmików na YT. 
	Ewentualnie plany mogą lekko zmienić z przyczyn mi nieznanych.

	</div>
	<div id="stopka">
	Wszelkie prawa zastrzeżonie. 
	
	</div>
	


	</div>
</body>
</html>