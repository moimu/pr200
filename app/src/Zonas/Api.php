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
        $sentencia1 = $this -> db ->prepare(" SELECT `fh`,`cantluz` FROM `Z400` ORDER BY `idregistro` DESC LIMIT 1"); 
        $sentencia1 -> execute(); 
        $sentencia1 -> bind_result( $fhZ400, $cantluzZ400 );
        // int $mysqli_stmt->num_rows;6666666666666666666666
        while( $sentencia1 -> fetch() ){  
            // echo "Zona Z400 - hora: $fhZ400, cantluz: $cantluzZ400 <br><br>";
            // defino array con datos de consulta, y guardo en $ar[]
            $ar[] = array( "nombreZona"=>"Z400",
            "nombreArea"=>null,
            "fecha"=>"$fhZ400",
            "magnitud"=>"iluminacion",
            "valor"=>"$cantluzZ400" );
        }
        $sentencia1 -> close();
        $sentencia2 = $this -> db->prepare(" SELECT count(`entrada`) FROM `B401` "); 
        $sentencia2 -> execute(); 
        $sentencia2 -> bind_result( $entradaB401 );
        while( $sentencia2 -> fetch() ){  
            // echo "Area B401 -  Total entradas: $entradaB401 <br><br>"; 
            $ar[] = array( "nombreZona"=>"Z400",
            "nombreArea"=>"B401",
            "fecha"=>"$dia",
            "magnitud"=>"entradas",
            "valor"=>"$entradaB401" ); 
        }
        $sentencia2 -> close();
        $sentencia3 = $this -> db->prepare(" SELECT count(`entrada`) FROM `B402` "); 
        $sentencia3 -> execute(); 
        $sentencia3 -> bind_result(  $entradaB402 );
        while( $sentencia3 -> fetch() ){  
            // echo "Area B402 - Total entradas: $entradaB402 <br><br>";
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