<?php
declare(strict_types=1);

namespace Moi\Zonas;

class ApiDescuentos extends Bd{

    /**
     * Construye clase padre base de datos
     * @return object 
     */
    public function __construct(){
        parent::__construct();
    }

    /**
     * Uso de base datos, consultas y construcción de array datos consulta
     * 
     * @param object $this -> db (parent)
     * @return array $array dos valores descuento Comida y descuento Bebida
     */
    public function descuentos( $medcantluz, $medtemperatura, $medhumedad ){
        
        $signocantluz = "<";
        $signotemperatura = "<";
        $signohumedad = "<";
        if( $medcantluz >= 50 ){   $signocantluz = ">=";   }
        if( $medtemperatura >= 20 ){   $signotemperatura = ">=";   }
        if( $medhumedad >= 50 ){   $signohumedad = ">=";   }

        $sentencia1 = $this -> db ->prepare("SELECT `descomida`,`desbebida` FROM `descuentosclima` 
        WHERE `cantluz` $signocantluz ? AND `temperatura` $signotemperatura ? AND `humedad` $signohumedad ?"); 
        $param1 = $medcantluz;
        $param2 = $medtemperatura;
        $param3 = $medhumedad;
        $sentencia1 -> bind_param( 'iii', $param1, $param2, $param3 );
       
        $sentencia1 -> execute(); 
        $sentencia1 -> bind_result( $descomida, $desbebida );
        while( $sentencia1 -> fetch() ){  
            $descuentos = array( 
            "descomida"=> $descomida,
            "desbebida"=> $desbebida );
        }
        $sentencia1 -> close();
        
        return $descuentos;
    }
    
    /**
     * Recibe array con datos de consulta devuelve json
     * 
     * @param array $array 
     * @return object json 
     */
    public function json( $array ){
        return json_encode( $array );
    }
}