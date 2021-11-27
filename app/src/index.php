<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pr200</title>
    <meta name="description" content="Control Zonas">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="body">
    <?php
        require '../vendor/autoload.php';
        use Moi\Zonas\Zona;
        // $new = new Zona("cd",4,5,6);
        // echo $new;
        $server = "mysql-pr200"; 
        $user = "root"; 
        $password = "rpass"; 
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
        $db -> close();

    ?>
    <header>

    </header>

    <main class="main">

        <section class ="section" id="section1">aaaaaaa</section>
        <section class ="section" id="section2">bbbbbbb</section>
        <section class ="section" id="section3">ccccc</section>
        <section class ="section" id="section4">ddddddd</section>
        <section class ="section" id="section5">eeeeeee</section>

    </main>

    <footer>

    </footer>

    <script src="./js/script.js" language="javascript" type="text/javascript"></script>
    
</body>
</html>