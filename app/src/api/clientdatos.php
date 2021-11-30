<?php

    require '../../vendor/autoload.php';
    use Moi\Zonas\Api;

    echo " Api Receive <br> ";

    $apireceive = new ApiReceive();
    $db = $apireceive -> db();

    /**
     * El registro de entrada se almacenada en servidor
     * El servicio devolverá si ha sido insertada con éxito
     */
    if( isset( $_POST['entradas'] ) ){
        $apireceive -> entradas( $db, $_POST['entradas'] );   
    }

    /**
     * El registro de iluminacion se almacenada en servidor
     * El servicio devolverá si ha sido insertada con éxito
     */
    if( isset( $_POST['iluminacion'] ) ){
        $apireceive -> iluminacion( $db, $_POST['iluminacion'] );  
    }

    $apireceive -> dbclose();