<?php
	session_start();
	if(!isset($_POST['login'])){
		header('Location: rejestracja.php');
		exit();

	}else{
		
		$dobrze=true;
		
		$nick=$_POST['login'];
		if((strlen($nick)<3) || (strlen($nick)>25)){
			$dobrze=false;
			$_SESSION['bnick']="Nick musi zabierać od 3 do 25 znaków.";
			
		}
		if(ctype_alnum($nick)==false){
			$dobrze=false;
			$_SESSION['bnick']="Nick musi zabierać jedynie litery i cyfry";
			
		}
		$haslo1=$_POST['haslo1'];
		$haslo2=$_POST['haslo2'];
		if((strlen($haslo1)<3)||(strlen($haslo1)>25)){
			
			$dobrze=false;
			$_SESSION['bhaslo']="Hasło musi zawierać od 3 do 25 znaków";
			
		}
		if($haslo1!=$haslo2){
			$dobrze=false;
			$_SESSION['bhaslo']="Hasła nie są indentyczne!";
			
		}
		$hash=password_hash($haslo1, PASSWORD_DEFAULT);
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
		{
			$wszystko_OK=false;
			$_SESSION['e_email']="Podaj poprawny adres e-mail!";
		}
		
		if(!isset($_POST['regulamin'])){
			
			$dobrze=false;
			$_SESSION['breguramin']="Akceptuj reguramin";
			
			
		}
	}
	if($dobrze==false){
		header('Location:rejestracja.php');
		exit();
	}
	require_once "connect.php";
	mysqli_report(MYSQLI_REPORT_STRICT);
	
	try{
		$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
		
		if ($polaczenie->connect_errno!=0){
			throw new Exception(mysqli_connect_errno());
		}else{
			
			$wynik=$polaczenie->query("SELECT id_user FROM user WHERE email='$email'");
			
			if (!$wynik) throw new Exception($polaczenie->error);
			
			$ilosc_email=$wynik->num_rows;
			
			if($ilosc_email>0)
			{
				$dobrze=false;
				$_SESSION['bemail']="Istnieje już konto przypisane do tego adresu e-mail!";
			}	
			
			$wynik=$polaczenie->query("SELECT id_user FROM user WHERE login='$nick'");
			
			if(!$wynik) throw new Exception($polaczenie->error);
			
			$ilosc_nickow=$wynik->num_rows;
			
			if($ilosc_nickow>0){
				
				$dobrze=false;
				$_SESSION['bnick']="Już instnieje taki nick!";
				
			}
			if($dobrze==true){
				
				if($polaczenie->query("INSERT INTO user VALUES (NULL, '$nick', '$hash', '$email', 0)")){
					
					$_SESSION['rejestracja']=true;
					header('Location:strefa_vip.php');
				}else{
					
					throw new Exception($polaczenie->error);
					
				}
				
				
				
			}
			$polaczenie->close();
		}
			
		
		
	}
	catch(Exception $e)
	{
		echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
		echo '<br />Informacja developerska: '.$e;
	}
		

?>