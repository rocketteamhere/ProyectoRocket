<?php
$json=array();
 $conexion=mysql_connect("localhost","root","","dbrocket");
 $consulta= "SELECT * FROM reportes";
 $resultado = mysql_query($conexion,$consulta);
 if($consulta)
 {
    if($reg=mysql_fetch_array($resultado))
    {
        $json['datos'][]=$reg;
    }
    mysql_close($conexion);
    echo json_encode($json);
 }
?>