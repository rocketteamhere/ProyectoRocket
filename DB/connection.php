<?php
if(!empty($_POST['user_id'])){
    $data = array();
    
    //database details
    $dbHost     = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName     = 'dbrocket';
    
    //create connection and select DB
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    if($db->connect_error){
        die("Unable to connect database: " . $db->connect_error);
    }
    
    //get user data from the database
    $query = $db->query("SELECT * FROM reportes");
    
    while($rows=$query->fetch_array()){
        
        $data['report'] = $rows['descripcion'];
       // $data['lat'] = $rows['latitud'];
        //$data['lon'] = $rows['latitud'];
    }else{
        $data['status'] = 'err';
        $data['lan'] = '';
        
    }
    
    //returns data as JSON format
    echo 'json_encode($data)';
}
?>