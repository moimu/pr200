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

        $sentencia1 = $this -> db ->prepare(" SELECT med.`fh`, med.`valor`
        FROM `mediciones` med 
        WHERE  med.`idzona` = (?) AND med.`idarea` = (?) AND med.`idmagnitud` = (?)
        ORDER BY med.`idmedicion` DESC LIMIT 1 "); 
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
            "magnitud"=>"iluminacion",
            "valor"=>"$cantluzZ400" );
        }
        $sentencia1 -> close();
        
        $sentencia2 = $this -> db->prepare(" SELECT count( med.`valor` )
        FROM `mediciones` med 
        WHERE  med.`idzona` = (?) AND med.`idarea` = (?) AND med.`idmagnitud` = (?) "); 
        $sentencia2 -> bind_param( 'sss', $param1, $param2, $param3 );
        $param1 = "4";
        $param2 = "14";
        $param3 = "2";
        $sentencia2 -> execute(); 
        $sentencia2 -> bind_result( $entradaB401 );
        while( $sentencia2 -> fetch() ){  
            $ar[] = array( "nombreZona"=>"Z400",
            "nombreArea"=>"B401",
            "fecha"=>"$dia",
            "magnitud"=>"entradas",
            "valor"=>"$entradaB401" ); 
        }
        $sentencia2 -> close();

        $sentencia3 = $this -> db->prepare(" SELECT count( med.`valor` )
        FROM `mediciones` med 
        WHERE  med.`idzona` = (?) AND med.`idarea` = (?) AND med.`idmagnitud` = (?) "); 
        $sentencia3 -> bind_param( 'sss', $param1, $param2, $param3 );
        $param1 = "4";
        $param2 = "15";
        $param3 = "2";
        $sentencia3 -> execute(); 
        $sentencia3 -> bind_result(  $entradaB402 );
        while( $sentencia3 -> fetch() ){  
            $ar[] = array( "nombreZona"=>"Z400",
            "nombreArea"=>"B402",
            "fecha"=>"$dia",
            "magnitud"=>"entradas",
            "valor"=>"$entradaB402" );
        }
        $sentencia3 -> close();

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