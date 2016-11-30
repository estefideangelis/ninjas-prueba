<?php
/* Define los valores que seran evaluados, en este ejemplo son valores estaticos,
en una verdadera aplicacion generalmente son dinamicos a partir de una base de datos */
$usuarioValidoA = "estefania";
$passwordValidoA = "estefi";

$usuarioValidoB = "silvina";
$passwordValidoB = "silvi";
/* Extrae los valores enviados desde la aplicacion movil */
$usuarioEnviado = $_GET['usuario'];
$passwordEnviado = $_GET['password'];
/* crea un array con datos arbitrarios que seran enviados de vuelta a la aplicacion */
$resultados = array();

/* verifica que el usuario y password concuerden correctamente */
if(  ($usuarioEnviado == $usuarioValidoA  && $passwordEnviado == $passwordValidoA) ||  ($usuarioEnviado == $usuarioValidoB  && $passwordEnviado == $passwordValidoB)){
	/*esta informacion se envia solo si la validacion es correcta */
	$resultados["mensaje"] = "Validacion Correcta";
	$resultados["validacion"] = "ok";
}else{
	/*esta informacion se envia si la validacion falla */
	$resultados["mensaje"] = "Usuario y password incorrectos";
	$resultados["validacion"] = "error";
}
/*convierte los resultados a formato json*/
$resultadosJson = json_encode($resultados);
/*muestra el resultado en un formato que no da problemas de seguridad en browsers */
echo $_GET['jsoncallback'] . '(' . $resultadosJson . ');';
?>