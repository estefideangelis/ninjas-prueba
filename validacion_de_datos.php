<?php

	// Conectamos con la base de datos y almacenamos la conexión en la variable conexión 
        $conexion = mysql_connect("localhost", "ucymxbzr_estefi", "maimo!123", "ucymxbzr_juego");
 
        //creamos una condicional IF para estar seguros de que hemos conectado correctamente
 
        if(!$conexion) 
        {
            echo "No se ha podido conectar con el servidor" . mysql_error();
        }
        else
        {
           /* echo "Hemos conectado al servidor <br />";*/
        }
 
        //seleccionamos la base de datos a la que conectarlos, el primer parametro es nuestra BD y el segundo la conexion
 
        $db_seleccionada = mysql_select_db("ucymxbzr_juego", $conexion);
 
        //Escribimos una condicional para que en el caso de que tengamos un error al conectar nos muestre un mensaje
 
        if(!$db_seleccionada)
        {
            echo "Hay un problema al seleccionar la base de datos" . mysql_error();
        }
        else
        {
           /* echo "Conectado correctamente a la base de datos <br />";*/
        }



	/* mysqli_query($conexion, "SET NAMES'utf8'");
      $this->conexion = $conexion;



	$conexion = new conexion;			// instancio conexion
	$conexion->conectado;					// asigno la propiedad*/

	$usuarioEnviado = $_GET['usuario'];		// Variable de usuario desde el form
	$passwordEnviado = $_GET['password'];	// Variable de password desde el form

	$resultados = array();	// Array de mensajes a devolver
	
	

/*	// Conexion a db
	if(!mysqli_connect_error()) {*/
		// Consulta a la db
				 
		$consulta  = "SELECT * FROM usuarios WHERE nombre_usuario = '$usuarioEnviado' and pass_usuario = '$passwordEnviado'";
		$respuesta = mysqli_query($conexion->conectado,$consulta);	// Respues de la db con la conexion y la consulta

		$matriz = array();					// Array de objetos donde guardo los datos de los usuarios
		
		while ($obj = mysqli_fetch_object($respuesta)) {
			$matriz[] = array("id" => $obj -> id_usuario, "usuario" => utf8_encode($obj -> nombre_usuario), "password" => utf8_encode($obj -> pass_usuario));
		}

		if ($matriz == null) {
			// SI EL RESULTADO ES NULL AVISA
			$resultados["mensaje"] = "Usuario y/o contraseña invalidos";
			$resultados["validacion"] = "No";
		
		} else {
			// SI EL RESULTADO TRAE DATA, LA PASA Y DA EL OK
			/*$resultados["mensaje"] = "Usuario correcto";*/
			$resultados["mensaje"] = $matriz;
			$resultados["validacion"] = "ok";
		}


	$resultadosJson = json_encode($resultados);	// PASA A JSON LOS MENSAJES
	echo $_GET['jsoncallback'] . '(' . $resultadosJson . ');'; // PASA ENCODEADO LOS MENSAJES
	


?>