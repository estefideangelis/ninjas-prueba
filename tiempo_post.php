<?php
//1.Que el soft de PHP se indentifique ante MySql


if($conexion=mysqli_connect("localhost","ucymxbzr_estefi","maimo!123","ucymxbzr_juego")){



	
//Recibir los datos y almacenarlos en variables
$tiempo= $_POST["tiempo"];

//Consulta
$insertar = "INSERT INTO jugada(tiempo) VALUES ('$tiempo')";

}


//Ejecutar consulta
$resultado= mysqli_query($conexion,$insertar);

if(!$resultado) {
	echo "<script language='javascript'>
alert('Falló el envio');
</script>";
}
else{
	echo "<script language='javascript'>
alert('se inserto tiempo');
</script>";
}

//cerrar conexion 
mysqli_close($conexion);


?>