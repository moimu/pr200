<?php
declare(strict_types=1);

namespace Moi\Zonas;

class Zona {

    private string $fecha;
    private int $cantluz;
    private int $entradasB401;
    private int $entradasB402;
    private const ZONA = "Z400";

    public function __construct( $fecha, $cantluz, $entradasB401, $entradasB402 ){
        $this-> fecha = $fecha;
        $this-> cantluz = $cantluz;
        $this-> entradasB401 = $entradasB401;
        $this-> entradasB402 = $entradasB402;
    }
    /**
     * @return string nombre de la zona instanciada
     */
    public function __toString(){
        return self::ZONA;
    }
    
    
}