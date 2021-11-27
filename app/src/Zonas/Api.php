<?php
// declare(strict_types=1);

namespace Moi\Zonas;

class Api {
    
    public function HOLA(){
        return "hola";
    }
    /**
     *  Problema no me encuentra la clase mysqli!!!
     */
    public function bd(){

        /** Conexion a la base de datos y consultas */
        $server = "mysql-pr200"; 
        $user = "root"; 
        $password = "rpass"; 
        $database = "zonas"; 
        $db = new mysqli($server,$user, $password,$database); 
        if($db->connect_error){ 
            die("La conexión con la bd ha fallado, error: " . $db->connect_errno . ": ". $db->connect_error); 
        } 
        return $db;

    }
    /**
     * 
     */
    public function retornaJson($db){
        /** Array que contendrá tres arrays con datos de las consultas */
        $ar = [];
        $dia = date("Y-m-d H:i:s"); 
        $sentencia1 = $db->prepare(" SELECT `fh`,`cantluz` FROM `Z400` ORDER BY `idregistro` DESC LIMIT 1"); 
        $sentencia1 -> execute(); 
        $sentencia1 -> bind_result( $fhZ400, $cantluzZ400 );
        while( $sentencia1->fetch() ){  echo "Zona Z400 - hora: $fhZ400, cantluz: $cantluzZ400 <br><br>";
            // defino array con datos de consulta, y guardo en $ar[]
            $ar[] = array( "nombreZona"=>"Z400",
            "nombreArea"=>null,
            "fecha"=>"$fhZ400",
            "magnitud"=>"iluminacion",
            "valor"=>"$cantluzZ400" );
        }
        $sentencia1 -> close();
        $sentencia2 = $db->prepare(" SELECT count(`entrada`) FROM `B401` "); 
        $sentencia2 -> execute(); 
        $sentencia2 -> bind_result( $entradaB401 );
        while( $sentencia2->fetch() ){  echo "Area B401 -  Total entradas: $entradaB401 <br><br>"; 
            $ar[] = array( "nombreZona"=>"Z400",
            "nombreArea"=>"B401",
            "fecha"=>"$dia",
            "magnitud"=>"entradas",
            "valor"=>"$entradaB401" ); 
        }
        $sentencia2 -> close();
        $sentencia3 = $db->prepare(" SELECT count(`entrada`) FROM `B402` "); 
        $sentencia3 -> execute(); 
        $sentencia3 -> bind_result(  $entradaB402 );
        while( $sentencia3->fetch() ){  echo "Area B402 - Total entradas: $entradaB402 <br><br>";
            $ar[] = array( "nombreZona"=>"Z400",
            "nombreArea"=>"B402",
            "fecha"=>"$dia",
            "magnitud"=>"entradas",
            "valor"=>"$entradaB402" );
        }
        $sentencia3 -> close();

        $db->close();

        return json_encode($ar);
    }

}