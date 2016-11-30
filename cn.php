<?php

$conexion=mysqli_connect("localhost", "ucymxbzr_estefi", "maimo!123", "ucymxbzr_juego");

//$conexion=mysqli_connect("localhost","ucymxbzr_estefi","maimo!123","ucymxbzr_movivet");


if(!$conexion){
	echo 'Error al conectar a la base de datos';
}
else{
	echo 'Conectados a la base de datos';
	 mysqli_query($conexion, "SET NAMES'utf8'");
      $this->conexion = $conexion;
}

?>


