<?php

    require '../../vendor/autoload.php';
    use Moi\Zonas\ApiDescuentos;

    echo " Api Descuentos <br> ";
    $api = new ApiDescuentos();

    // Se mostrará un json donde se especifica si tiene descuento en comida y bebida
    if( isset( $_POST['medcantluz'] ) ){

        $ar = $api -> descuentos( $_POST['medcantluz'], $_POST['medtemperatura'], $_POST['medhumedad'] );
        echo $api -> json( $ar );

    }