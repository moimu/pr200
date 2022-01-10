<?php
declare(strict_types=1);

namespace Moi\Zonas;

class Api extends Bd{

    /**
     * Constructor para la clase Api servidora de datos
     * @return object 
     */
    public function __construct(){
        parent::__construct();
    }
    /**
     * Uso de base datos, consultas y construcción de array 
     * con datos de las consultas
     * 
     * @param object $this -> db (parent)
     * @return array $array contenedor de 3 arrays (datos de consultas)
     */
    public function consultas(){
        $ar = [];
        $fh = date("Y-m-d H:i:s"); 

        // Calcularé la media de los valores de luminosidad de la ultima media hora
        // la consulta retornará NULL si no hay mediciones para este intervalo

        // SELECT med.`fh`, med.`valor`
        // FROM `mediciones` med 
        // WHERE  med.`idzona` = (?) AND med.`idarea` = (?) AND med.`idmagnitud` = (?)
        // ORDER BY med.`idmedicion` DESC LIMIT 1

        $sentencia1 = $this -> db ->prepare(" SELECT ROUND(AVG(`valor`), 2) as `medLuminosidad`, zon. `nombre`, zon.`titulo`, are.`nombre`, are.`titulo`, cli.`uid`
        FROM `mediciones` med 
        INNER JOIN `clientes` cli ON med.`idcliente` = cli.`idcliente`
        INNER JOIN `areas` are ON med.`idarea` = are.`idarea`
        INNER JOIN `zonas` zon ON med.`idzona` = zon.`idzona` 
        WHERE `fh`>= DATE_SUB(NOW(), INTERVAL 30 MINUTE)
        AND med.`idzona` = (?) AND med.`idarea` = (?) AND med.`idmagnitud` = (?) "); 
        $sentencia1 -> bind_param( 'sss', $param1, $param2, $param3 );
        $param1 = "4";
        $param2 = "1";
        $param3 = "3";
        $sentencia1 -> execute(); 
        $sentencia1 -> bind_result( $medLuminosidad, $nombreZona, $tituloZona, $nombreArea, $tituloArea, $uidCliente );
        while( $sentencia1 -> fetch() ){  
            $ar[] = array( "nombreZona"=> $nombreZona,
            "tituloZona"=> $tituloZona,
            "nombreArea"=> $nombreArea,
            "tituloArea"=> $tituloArea,
            "fecha"=> "$fh",
            "magnitud"=> "medLuminosidad",
            "valor"=>floatval($medLuminosidad), 
            "cliente"=> $uidCliente );
        }
        $sentencia1 -> close();
        
        // SELECT count( med.`valor` )
        // FROM `mediciones` med 
        // WHERE  med.`idzona` = (?) AND med.`idarea` = (?) AND med.`idmagnitud` = (?)

// Por cada cliente se generá un objeto con su UID y total de entradas en últimos 2 meses
        $sentencia2 = $this -> db->prepare(" SELECT cli.`uid`, COUNT(med.`valor`), zon. `nombre`, zon.`titulo`, are.`nombre`, are.`titulo`
        FROM `mediciones` med 
        INNER JOIN `clientes` cli ON med.`idcliente` = cli.`idcliente`
        INNER JOIN `areas` are ON med.`idarea` = are.`idarea`
        INNER JOIN `zonas` zon ON med.`idzona` = zon.`idzona`
        WHERE cli.`nombre` <> (?) AND med.`fh` >= DATE_SUB(NOW(), INTERVAL 2 MONTH)
        AND med.`idzona` = (?) AND med.`idarea` >= (?) AND med.`idarea` <= (?) AND med.`idmagnitud` = (?) 
        GROUP BY med.`idcliente` "); 
        $sentencia2 -> bind_param( 'sssss', $param1, $param2, $param3, $param4, $param5 );
        $param1 = "";
        $param2 = "4";
        $param3 = "14";
        $param4 = "15";
        $param5 = "2";
        $sentencia2 -> execute(); 
        $sentencia2 -> bind_result( $uidCliente, $entradasDosmesesCliente, $nombreZona, $tituloZona, $nombreArea, $tituloArea );
        while( $sentencia2 -> fetch() ){  
            $ar[] = array( "nombreZona"=> $nombreZona,
            "tituloZona"=> $tituloZona,
            "nombreArea"=> $nombreArea,
            "tituloArea"=> $tituloArea,
            "fecha"=> "$fh",
            "magnitud"=> "fidelidad",
            "valor"=> $entradasDosmesesCliente,
            "cliente"=> $uidCliente ); 
        }
        $sentencia2 -> close();

        $this -> db -> close();
        $array = ["mediciones" => $ar]; 
        return $array;
    }
    /**
     * Recibe array con datos de las consultas
     * transformandolo a json
     * @param array $array 
     * @return object json 
     */
    public function json( $array ){
        return json_encode( $array );
    }
}