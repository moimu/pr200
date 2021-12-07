<?php
declare(strict_types=1);

namespace Moi\Zonas;
// use mysqli;

class ApiReceive extends Bd{

    /** 
     * Constructor para la clase ApiReceive
     * encargada de recibir datos recopilados por el prototipo
     * @return object
     */
    public function __construct(){
        parent::__construct();
    }
    /**
     * Uso de base datos y la variable del Post recibido
     * inserta un registro en entrada por RFID
     * @param $valorPost
     * @param object $db 
     * @return void (imprime en cliente prototipo, si inserción dato es correcta)
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
     * Uso de base datos y la variable del Post recibido
     * inserta un registro con dato Luminosidad del área
     * @param $valorPost
     * @param object $db 
     * @return void (imprime en cliente prototipo, si inserción dato es correcta)
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