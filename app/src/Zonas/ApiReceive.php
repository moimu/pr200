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
     * Uso de base datos y dato del Post recibido (uid tarjeta)
     * Consulto el id del cliente y con el inserto 
     * registro de entrada para el area B401 El Ancla
     * 
     * @param $valorPost
     * @return void (imprime en cliente prototipo, si inserción es correcta)
     */
    public function entradas( $uidCliente ){

        echo "Post RFID UID cliente : ".$uidCliente;

        // Consulto el id correspondiente al uid del cliente para insertar registro
        $sentencia1 = $this -> db -> prepare(" SELECT `idcliente` FROM `clientes` WHERE `uid` = (?) "); 
        $param1 = $uidCliente; 
        $sentencia1 -> bind_param('s', $param1);
        $sentencia1 -> bind_result( $idCliente );
        $sentencia1 -> execute();
        while( $sentencia1 -> fetch() ){  
            $idCliente = $idCliente;
        }
        $sentencia1 -> close();

        // Inserto la entrada del cliente
        $sentencia2 = $this -> db -> prepare(" INSERT INTO `mediciones`(`idzona`,`idarea`,`idmagnitud`,`idcliente`) VALUES (?,?,?,?) "); 
        $param1 = "4"; 
        $param2 = "14";
        $param3 = "2";
        $param4 = $idCliente;
        $sentencia2 -> bind_param('ssss', $param1, $param2, $param3, $param4);
        $sentencia2 -> execute();
        echo ( $sentencia2 -> affected_rows > 0 )?" entrada registrada ":" Error registro entrada ";
        $sentencia2 -> close();

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
        $param1 = $valorPost; 
        $param2 = "4";
        $param3 = "1";
        $param4 = "3";
        $sentencia -> bind_param('isss', $param1, $param2, $param3, $param4);
        $sentencia -> execute();
        echo ( $sentencia -> affected_rows > 0 )?" registrado ":" Error registro " ;
        $sentencia -> close();

        $this -> db -> close();

    }

}