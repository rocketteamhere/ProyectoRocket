<?php

include_once '../DB/connection.php';
//Si se dio clic en guardar:
if(isset($_POST['saveUser'])){
	//Pasamos los parametros por medio de post
	$newuser = $db->real_escape_string($_POST['user']);
	$nombre =$db->real_escape_string($_POST['nombre']);   
	$ape = $db->real_escape_string($_POST['ape']);
	$pass = $db->real_escape_string($_POST['pass']);
	$tel = $db->real_escape_string($_POST['telefono']);

	$contador=0;
	$resultado = $db->query("SELECT usuario FROM users");

	while ($rows = $resultado->fetch_array()) {
		if ($rows["usuario"]==$newuser) {
	 		$contador++;
		}
	}
	if ($contador==0) {
			//Realizamos la consulta
	 		$SQL =$db->query("INSERT INTO users(usuario,pass, nombres, apellidos, telefono) VALUES('$newuser','$pass', '$nombre','$ape','$tel')");
	 		if(!$SQL){	 	//Mandar el mensaje de error
				echo $db->error;
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