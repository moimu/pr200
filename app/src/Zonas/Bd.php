<?php
declare(strict_types=1);

namespace Moi\Zonas;
use mysqli;

/**
 * Instancia objeto base de datos, y es contenido protected object $db
 * para uso de clases hijas.
 * código de error sentencia más reciente connect_errno
 * string del último error de una sentencia connect_error
 * @return object $db
 */
class Bd {

    private string $server;
    private string $user;
    private string $password;
    private string $database;
    protected object $db;

    public function __construct(){

        $this -> server = "mysql-pr200"; 
        $this -> user = "root"; 
        $this -> password = "rpass"; 
        $this -> database = "zonas"; 
        $db = new mysqli($this->server,$this->user, $this->password,$this->database); 
        if($db->connect_error){ 
        die("conexión bd ha fallado, error: ".$db->connect_errno . ": ". $db->connect_error); 
        }
        $this -> db = $db;
        return $this -> db;
    }

}

