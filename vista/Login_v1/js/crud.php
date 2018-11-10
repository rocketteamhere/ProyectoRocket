<?php

include_once '../DB/connection.php';
//Si se dio clic en guardar:
if(isset($_POST['saveUser'])){
	//Pasamos los parametros por medio de post
	$newuser = $MySQLiconn->real_escape_string($_POST['user']);
	$nombre =$MySQLiconn->real_escape_string($_POST['nombre']);   
	$ape = $MySQLiconn->real_escape_string($_POST['ape']);
	$pass = $MySQLiconn->real_escape_string($_POST['pass']);
	$tel = $MySQLiconn->real_escape_string($_POST['telefono']);

	$contador=0;
	$resultado = $MySQLiconn->query("SELECT usuario FROM users");

	while ($rows = $resultado->fetch_array()) {
		if ($rows["usuario"]==$newuser) {
	 		$contador++;
		}
	}
	if ($contador==0) {
			//Realizamos la consulta
	 		$SQL =$MySQLiconn->query("INSERT INTO users(usuario,pass, nombres, apellidos, telefono) VALUES('$newuser','$pass', '$nombre','$ape','$tel')");
	 		if(!$SQL){	 	//Mandar el mensaje de error
				echo $MySQLiconn->error;
	 		} 
	 		else{
	 			//Mandamos un mensaje de exito:
	 			echo"<script>alert('Se ha añadido un nuevo usuario al sistema')</script>";
	 		}
		}
	}	
	else{
	 	echo"<script>alert('Este usuario ya existe...')</script>";
	 	return 0;		
	}
}
?>