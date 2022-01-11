<?php
    require '../../vendor/autoload.php';
    use Moi\Zonas\ApiReceive;

    $apireceive = new ApiReceive();

    /**
     * El registro de entrada se almacenada en servidor
     * El servicio devolverá al cliente si ha sido insertada con éxito
     */
    if( isset( $_POST['entradas'] ) ){

        $apireceive -> registroCliente( $_POST['entradas'] ); 
        // $apireceive -> entradas( $_POST['entradas'] );   

    }
    /**
     * El registro de iluminación se almacenada en servidor
     * El servicio devolverá al cliente si ha sido insertada con éxito
     */
    if( isset( $_POST['iluminacion'] ) ){
        $apireceive -> iluminacion( $_POST['iluminacion'] );  
    }