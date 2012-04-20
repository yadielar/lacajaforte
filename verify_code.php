<?php

sleep(5);

$code = strtolower(implode($_POST));
$valid = false;

if ($code == 'agua0') {
	$valid = true;
}

if ($valid) {
	$response = array (
		"valid" => true,
		"output" => "C&oacute;digo Correcto",
		"winner" => array (
			"msg" => "&iexcl;Acabas de abrir La Caja Forte!",
			"prize" => "&iexcl;TOMA! Te ganaste 1 tarjeta de d&eacute;bito valorada en $25.",
			"code" => $code
		)
	);
} else {
	$response = array (
		"valid" => false,
		"output" => "Código Incorrecto"
	);
}
//echo json_encode($response);

?>