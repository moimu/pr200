<?php
echo "api de insercion<br>";


$server = "mysql-pr200"; 
$user = "root"; 
$password = "rpass"; 
$database = "zonas"; 
$db = new mysqli($server,$user, $password,$database); 
if($db->connect_error){ 
    die("conexión bd ha fallado, error: ".$db->connect_errno . ": ". $db->connect_error); 
}

// El registro de entrada se almacenada en servidor
// El servicio devolverá como respuesta si ha sido insertada con éxito
if( isset($_POST['entradas']) ){
    
    
    
    echo $_POST['entradas'];

    $sentencia = $db -> prepare(" INSERT INTO `B401` VALUES () "); 
    // $sentencia -> bind_param('s', $param1);
    // $param1 = $_POST['fruta']; 
    $sentencia -> execute();
    if ( $sentencia -> affected_rows > 0 ){
        echo " entrada RFID registrada ";
    }
    else{
        echo " error insercion RFID ";
    }
    $sentencia -> close();
}

// El registro de iluminacion se almacenada en servidor
if( isset($_POST['iluminacion']) ){

    echo $_POST['iluminacion'];

    $sentencia = $db -> prepare(" INSERT INTO `Z400`(`cantluz`)  VALUES (?) ");
    $sentencia -> bind_param('i', $param1);
    $param1 = $_POST['iluminacion']; 
    $sentencia -> execute();
    if ( $sentencia -> affected_rows > 0 ){
        echo " entrada iluminacion registrada ";
    }
    else{
        echo " error insercion iluminacion ";
    }
    $sentencia -> close();

    
}

$db->close();