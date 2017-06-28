<?php

$email = trim(filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL));

if(!$email){

	echo 'Não é e-mail váilido';
	exit;

}

$url = "http://spamformblocker.xs/";
//$url = "http://spamformblocker.xsinformatica.com.br/";

// create curl resource
$ch = curl_init();

// set url
curl_setopt($ch, CURLOPT_URL, $url . "emails/" . $email);

// set type
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string
$output = curl_exec($ch);

// close curl resource to free up system resources
curl_close($ch);

$s = json_decode($output);
var_dump($s);
if($s->Cod == 3){

	echo 'E-mail foi bloqueado com sucesso';
}
else{

	echo 'E-mail não pode ser bloqueado. Motivo: ' . $s->Resposta;

}
