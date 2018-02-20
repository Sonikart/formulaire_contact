<?php
    ini_set('display_errors', '1');

	$errors = [];
	$emails = ['votre@adressemail.fr', 'votre@adressemail.fr', 'votre@adressemail.fr']; // Email de contact (3)->select de la page index.php

	if(!array_key_exists('message', $_POST) || $_POST['name'] == ''){
		$errors['name'] = "Vous n'avez pas renseigné votre nom";
	}
    if(!array_key_exists('email', $_POST) || $_POST['email'] == '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Vous n'avez pas renseigné un email valide";
    }
    if(!array_key_exists('message', $_POST) || $_POST['message'] == ''){
        $errors['message'] = "Vous n'avez pas renseigné votre message";
    }
    if(!array_key_exists('service', $_POST) || !isset($emails[$_POST['service']])){
        $errors['service'] = "Le service que vous demander n'existe pas.";
    }

    session_start();
    if(!empty($errors)){
        $_SESSION['errors'] = $errors;
        $_SESSION['inputs'] = $_POST;
	    header('Location: index.php');
    }else{
	    $_SESSION['success'] = 1;
        $headers = 'FROM: '.$_POST['email'];
        $message = $_POST['message'];
        mail($emails[$_POST['service']], 'Un email de '. $_POST['name'], $message, $headers);
        header('location: index.php');
    }

