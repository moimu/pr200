<?php
declare(strict_types=1);

namespace Moi\Zonas;
// use mysqli;

class ApiReceive extends Bd{

    /** 
     * Constructor para la clase ApiReceive
     */
    public function __construct(){
        parent::__construct();
    }
    // public function db(){
    //     $server = "mysql-pr200"; 
    //     $user = "root"; 
    //     $password = "rpass"; 
    //     $database = "zonas"; 
    //     $db = new mysqli($server,$user, $password,$database); 
    //     if($db->connect_error){ 
    //     die("conexión bd ha fallado, error: ".$db->connect_errno . ": ". $db->connect_error); 
    //     }
    //     return $db;
    // }
    /**
     * Recibe base datos y la variable del Post recibido
     * inserta un registro en entrada por RFID
     * @param object $db 
     */
    public function entradas( $valorPost ){

        echo "Recibida entrada RFID : ".$valorPost;

        $sentencia = $this -> db -> prepare(" INSERT INTO `B401` VALUES () "); 
        $sentencia -> execute();
        echo ( $sentencia -> affected_rows > 0 )?" Entrada RFID registrada ":" Error insercion RFID ";
        $sentencia -> close();
        $this -> db -> close();
    }
    /**
     * Recibe base datos y la variable del Post recibido
     * inserta un registro con dato Luminosidad del área
     * @param object $db 
     */
    public function iluminacion( $valorPost ){

        echo "Recibido dato Luminosidad : ".$valorPost;

        $sentencia = $this -> db -> prepare(" INSERT INTO `Z400`(`cantluz`)  VALUES (?) ");
        $sentencia -> bind_param('i', $param1);
        $param1 = $valorPost; 
        $sentencia -> execute();
        echo ( $sentencia -> affected_rows > 0 )?" Iluminacion registrada ":" Error insercion iluminacion " ;
        $sentencia -> close();
        $this -> db -> close();
    }

}