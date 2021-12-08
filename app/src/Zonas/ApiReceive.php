<?php
declare(strict_types=1);

namespace Moi\Zonas;

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

        $sentencia = $this -> db -> prepare(" INSERT INTO `mediciones`(`idzona`,`idarea`,`idmagnitud`) VALUES (?,?,?) "); 
        $sentencia -> bind_param('sss', $param1, $param2, $param3);
        $param1 = "4"; 
        $param2 = "14";
        $param3 = "2";
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

        $sentencia = $this -> db -> prepare(" INSERT INTO `mediciones`(`valor`,`idzona`,`idarea`,`idmagnitud`) VALUES (?,?,?,?) ");
        $sentencia -> bind_param('isss', $param1, $param2, $param3, $param4);
        $param1 = $valorPost; 
        $param2 = "4";
        $param3 = "1";
        $param4 = "3";
        $sentencia -> execute();
        echo ( $sentencia -> affected_rows > 0 )?" Iluminacion registrada ":" Error insercion iluminacion " ;
        $sentencia -> close();
        $this -> db -> close();
    }

}

