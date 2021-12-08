<?php
declare(strict_types=1);

namespace Moi\Zonas;

class Urls extends Bd{

     /** 
     * Constructor para la clase Urls
     * encargada de devolver todas las url base de API
     * necesarias para consumo de la aplicación 
     * @return object
     */
    public function __construct(){
        parent::__construct();
    }
    /**
     * Uso de base datos y consulta de urls Apis de Prueba
     * @return array $arUrls 
     */
    public function urlsPrueba( ){

        $sentencia = $this -> db -> prepare(" SELECT `url` FROM `servicios` WHERE `idservicio` < ? "); 
        $sentencia -> bind_param('i', $param1);
        $param1 = 11; 
        $sentencia -> execute();
        $sentencia -> bind_result( $url );
        while( $sentencia -> fetch() ){  
            $arUrls[] = $url;
        }
        $sentencia -> close();
        $this -> db -> close();

        return  json_encode($arUrls); 
    }
    /**
     * Uso de base datos y consulta de urls Apis de Colaboradores
     * @return array $arUrls 
     */
    public function urlsColaboraciones( ){

        $sentencia = $this -> db -> prepare(" SELECT `url` FROM `servicios` WHERE `idservicio` > ? AND `idservicio` < ? "); 
        $sentencia -> bind_param('i', $param1);
        $param1 = 10; 
        $param2 = 21; 
        $sentencia -> execute();
        $sentencia -> bind_result( $url );
        while( $sentencia -> fetch() ){  
            $arUrls[] = $url;
        }
        $sentencia -> close();
        $this -> db -> close();
       
        return  json_encode($arUrls); 
    }

}