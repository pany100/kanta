<?php 
$emailTo = 'pany100@gmail.com';
$siteTitle = 'kantohogar';
error_reporting(E_ALL ^ E_NOTICE); // hide all basic notices from PHP

//If the form is submitted
if(isset($_POST['submitted'])) {
	
	// require a name from user
	if(trim($_POST['contactName']) === '') {
		$nameError =  'Has olvidado tu nombre.'; 
		$hasError = true;
	} else {
		$name = trim($_POST['contactName']);
	}
	
	// need valid email
	if(trim($_POST['email']) === '')  {
		$emailError = 'Olvidaste poner tu correo electrónico.';
		$hasError = true;
	} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
		$emailError = 'El correo electrónico que agregaste es inválido.';
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	// we need at least some content
	if(trim($_POST['phone']) === '') {
		$phoneError = 'Olvidaste agregar tu teléfono.';
		$hasError = true;
	} else {
		$phone = trim($_POST['phone']);
	}
		
	// we need at least some content
	if(trim($_POST['comments']) === '') {
		$commentError = 'Olvidaste poner tu mensaje.';
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['comments']));
		} else {
			$comments = trim($_POST['comments']);
		}
	}
		
	// upon no failure errors let's email now!
	if(!isset($hasError)) {
		
		$subject = 'Nuevo mensaje para '.$siteTitle.' de '.$name;
		$sendCopy = trim($_POST['sendCopy']);
		$body = "Nombre: $name \n\nEmail: $email \n\nMensaje: $comments";
		$headers = 'From: ' .' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;

		mail($emailTo, $subject, $body, $headers);
		
		// set our boolean completion value to TRUE
		$emailSent = true;
	}
}
?>