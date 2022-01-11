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
     * Uso de base datos y dato del Post recibido
     * inserta un registro en entrada por RFID
     * para el area B401 El Ancla
     * @param $valorPost
     * @return void (imprime en cliente prototipo, si inserción es correcta)
     */
    public function registroCliente( $uidCliente ){

        echo "Recibido cliente UID : ".$uidCliente;
        // averiguamos idcliente si existe el cliente.
        $sentencia1 = $this -> db -> prepare(" SELECT `idcliente` FROM `clientes` WHERE `uid` = (?) "); 
        $sentencia1 -> bind_param('s', $param1);
        $sentencia1 -> bind_result( $idCliente );
        // si no existe lo creamos como nuevo cliente.
        $sentencia2 = $this -> db -> prepare(" INSERT INTO `clientes` (`uid`) VALUES (?) "); 
        $sentencia2 -> bind_param('s', $param1);

        $param1 = $uidCliente; 
        
        $sentencia1 -> execute();
        while( $sentencia1 -> fetch() ){  
            $idCliente = $idCliente;
        }
        if( $sentencia1 -> affected_rows > 0 ){
            echo " UID Cliente registrado ";
        } 
        else{   
            // Una vez creado el cliente, averiguamos su idCliente
            $sentencia2 -> execute();
            echo ( $sentencia2 -> affected_rows > 0 )?" Nuevo cliente registrado ":" Error registro cliente ";
            $sentencia1 -> execute();
            while( $sentencia1 -> fetch() ){  
                $idCliente = $idCliente;
            }
        }
        $sentencia1 -> close();
        $sentencia2 -> close();
        $this -> db -> close();

        echo "id cliente".$idCliente;
        return $idCliente;
        
    }
    /**
     * Uso de base datos y dato del Post recibido
     * inserta un registro en entrada por RFID
     * para el area B401 El Ancla
     * @param $valorPost
     * @return void (imprime en cliente prototipo, si inserción es correcta)
     */
    public function entradas( $valorPost ){

        echo "Post RFID : ".$valorPost;

        $sentencia = $this -> db -> prepare(" INSERT INTO `mediciones`(`idzona`,`idarea`,`idmagnitud`) VALUES (?,?,?) "); 
        $sentencia -> bind_param('sss', $param1, $param2, $param3);
        $param1 = "4"; 
        $param2 = "14";
        $param3 = "2";
        $sentencia -> execute();
        echo ( $sentencia -> affected_rows > 0 )?" registrado ":" Error registro ";
        $sentencia -> close();
        $this -> db -> close();
       
    }
    /**
     * Uso de base datos y la variable del Post recibido
     * inserta un registro con dato Luminosidad de la Zona
     * Z400 La Guarida de los Piratas
     * @param $valorPost
     * @return void (imprime en cliente prototipo, si inserción es correcta)
     */
    public function iluminacion( $valorPost ){

        echo "Post Luminosidad : ".$valorPost;

        $sentencia = $this -> db -> prepare(" INSERT INTO `mediciones`(`valor`,`idzona`,`idarea`,`idmagnitud`) VALUES (?,?,?,?) ");
        $sentencia -> bind_param('isss', $param1, $param2, $param3, $param4);
        $param1 = $valorPost; 
        $param2 = "4";
        $param3 = "1";
        $param4 = "3";
        $sentencia -> execute();
        echo ( $sentencia -> affected_rows > 0 )?" registrado ":" Error registro " ;
        $sentencia -> close();
        $this -> db -> close();
    }

}

