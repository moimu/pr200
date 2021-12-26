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
        $dia = date("Y-m-d H:i:s"); 

        // Calcularé la media de los valores de luminosidad de la ultima media hora
        // la consulta retornará NULL si no hay mediciones para este intervalo

        // SELECT med.`fh`, med.`valor`
        // FROM `mediciones` med 
        // WHERE  med.`idzona` = (?) AND med.`idarea` = (?) AND med.`idmagnitud` = (?)
        // ORDER BY med.`idmedicion` DESC LIMIT 1

        $sentencia1 = $this -> db ->prepare(" SELECT AVG(`valor`) as `mediaLuminosidad` FROM `mediciones` 
        WHERE `fh`>= DATE_SUB(NOW(), INTERVAL 30 MINUTE)
        AND `idzona` = (?) AND `idarea` = (?) AND idmagnitud = (?) "); 

        $sentencia1 -> bind_param( 'sss', $param1, $param2, $param3 );
        $param1 = "4";
        $param2 = "1";
        $param3 = "3";
        $sentencia1 -> execute(); 
        $sentencia1 -> bind_result( $fhZ400, $cantluzZ400 );
        while( $sentencia1 -> fetch() ){  
            $ar[] = array( "nombreZona"=>"Z400",
            "nombreArea"=>null,
            "fecha"=>"$fhZ400",
            "magnitud"=>"luminosidad",
            "valor"=>$cantluzZ400, 
            "cliente"=>null );
        }
        $sentencia1 -> close();
        
        // SELECT count( med.`valor` )
        // FROM `mediciones` med 
        // WHERE  med.`idzona` = (?) AND med.`idarea` = (?) AND med.`idmagnitud` = (?)

        $sentencia2 = $this -> db->prepare(" SELECT cli.`uid`, COUNT(med.`valor`)
        FROM `mediciones` med 
        INNER JOIN `clientes` cli ON med.`idcliente` = cli.`idcliente`
        WHERE cli.`nombre` <> (?) AND med.`fh` >= DATE_SUB(NOW(), INTERVAL 2 MONTH)
        AND med.`idzona` = (?) AND med.`idarea` >= (?) AND med.`idarea` <= (?) AND med.`idmagnitud` = (?) 
        GROUP BY med.`idcliente` "); 

        $sentencia2 -> bind_param( 'sss', $param1, $param2, $param3, $param4, $param5 );
        $param1 = "nulo";
        $param2 = "4";
        $param3 = "14";
        $param4 = "15";
        $param5 = "2";
        $sentencia2 -> execute(); 
        $sentencia2 -> bind_result( $uidCliente, $entradasDosmeses );
        // Por cada cliente se generá un objeto con su UID y total de entradas en últimos 2 meses
        while( $sentencia2 -> fetch() ){  
            $ar[] = array( "nombreZona"=>"Z400",
            "nombreArea"=>"fidelidad",
            "fecha"=>"$dia",
            "magnitud"=>"entradas",
            "valor"=>$entradasDosmeses,
            "cliente"=>"$uidCliente" ); 
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