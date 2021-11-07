<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="description" content="Control Zonas">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php
        require '../vendor/autoload.php';
        use Moi\Zonas\Zona;

        $new = new Zona("cd",4,5,6);
        echo $new;

        $server = "mysql-pr200"; 
        $user = "root"; 
        $password = "root"; 
        $database = "zonas"; 
        $db = new mysqli($server,$user, $password,$database); 
        if($db->connect_error){ 
            die("La conexión con la bd ha fallado, error: " . $db->connect_errno . ": ". $db->connect_error); 
        } 

        $sentencia = $db->prepare(" SELECT * FROM `Z400` ");     
        $sentencia -> execute();
        $sentencia -> bind_result($idregistro, $fh, $cantluz);
        while( $sentencia->fetch() ){
            echo "<br>";
            echo "$idregistro, $fh, $cantluz<br>";
        }
    ?>
    <header>

    </header>

    <main>

    </main>

    <footer>

    </footer>
    <script src="./js/script.js" language="javascript" type="text/javascript"></script>
    
</body>
</html>