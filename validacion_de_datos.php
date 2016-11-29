<?php
header('Access-Control-Allow-Origin: http://www.juego-ninja.tk', false);
error_reporting(E_ALL);
ini_set('display_errors', 'On');

	//conectar a la base de datos 
    @require "cn.php";			// traigo el codigo de conexion 
/*   if($conexion=mysqli_connect("localhost","ucymxbzr_estefi","maimo!123","ucymxbzr_juego")){
	echo 'conectado';*/
  

	$conexion = new conexion;				// instancio conexion*/
	$conexion->conectado;					// asigno la propiedad

	$usuarioEnviado = $_GET['usuario'];		// Variable de usuario desde el form
	$passwordEnviado = $_GET['password'];	// Variable de password desde el form

	$resultados = array();					// Array de mensajes a devolver

	// Conexion a db
	/*if(!mysqli_connect_error()) {*/
		// Consulta a la db
		$consulta  = "SELECT * FROM usuarios WHERE nombre_usuario = '$usuarioEnviado' and pass_usuario = '$passwordEnviado'";

		$respuesta = mysqli_query($conexion->conectado,$consulta);	// Respues de la db con la conexion y la consulta

		$matriz = array();					// Array de objetos donde guardo los datos de los usuarios
		
		while ($obj = mysqli_fetch_object($respuesta)) {
			$matriz[] = array("id_usuario" => $obj -> id_usuario, "usuario" => utf8_encode($obj -> nombre_usuario));
			
		}

		if ($matriz == null) {
			// SI EL RESULTADO ES NULL AVISA
			$resultados["mensaje"] = "Usuario y/o contraseña invalidos";
			$resultados["validacion"] = "No";
		} else {
			// SI EL RESULTADO TRAE DATA, LA PASA Y DA EL OK
			// $resultados["mensaje"] = "Usuario correcto";
			$resultados["mensaje"] = $matriz;
			$resultados["validacion"] = "ok";
		}
	

	$resultadosJson = json_encode($resultados);	// PASA A JSON LOS MENSAJES
	echo $_GET['jsoncallback'] . '(' . $resultadosJson . ');'; // PASA ENCODEADO LOS MENSAJES
	
	
?>