<?php 
header('Access-Control-Allow-Origin: http://www.juego-ninja.tk', false);
//conexion a base de datos 

if($link=mysqli_connect("localhost","ucymxbzr_estefi","maimo!123","ucymxbzr_juego")){
//echo "se conecto";
//consulta
//$consulta="SELECT*FROM productos"; --> cambiamos para que no traiga todo esto si solo necesitamos tres osas 
$consulta="SELECT tiempo_a,tiempo_b,id_partida FROM partida";
$respuesta= mysqli_query($link,$consulta);

$matriz=array(); //creamos un array 

while($obj=mysqli_fetch_object($respuesta)){
	$matriz[]=array('ID' => $obj->id_partida,'tiempoa'=>utf8_encode($obj->tiempo_a), 'tiempob'=>utf8_encode($obj->tiempo_b)
	
	);
}

//convirtiendo datos a formato Json
echo json_encode($matriz); //-->le agrego un nombre para por lo menos ponerle un nombre a todo ese conjunto de objetos, o sea el array, le pongo l nombre a un array.


}else{
echo "no se conecto";
}
?>