<?php
session_start();

include("../DB/connection.php");
 
$login = $_POST['user'];
$pass = $_POST['pass'];
if($_POST['txtRuta']=="/vista/Pagina de inicio/index.html")
{
	$ruta="Menu.php";
}
else
{
	$ruta=$_POST['txtRuta'];
}
if(!empty($ruta))
{
	$ruta="../".$ruta;
}
else
{
	$ruta='/ProyectoRocket/vista/Pagina de inicio/index.html';
}

 
$query ="SELECT * FROM users WHERE usuario= '$login' && pass = '$pass'";

$result = $mysqli->query($query);
//printf($result);
if ($result->num_rows > 0) {     
	$row = $result->fetch_array(MYSQLI_ASSOC);
	  	$_SESSION['login']=true;//Sirve para validar la sesion
	    $_SESSION['usuario'] = $row['usuario'];
	    $_SESSION['nombre']=$row['nombres'];
	    $_SESSION['apellido']=$row['apellidos'];
	    $_SESSION['tel']=$row['telefono'];
	    $_SESSION['start'] = time();
	    $_SESSION['expire'] = $_SESSION['start'] + (34000);
  	echo "<script>window.location='$ruta';</script>";
	} else { 
	  echo '<script language="javascript">alert("Usuario/Contraseña no coinciden, por favor verificar los datos.");</script>'; 
	  	echo "<script>window.location='".$ruta."';</script>";
	 }
	 include("../Database/cerrarconexion.php");
?>