<?php

    require '../../vendor/autoload.php';
    use Moi\Zonas\ApiDescuentos;

    $api = new ApiDescuentos();

    // Se mostrará un json donde se especifica si tiene descuento en comida y bebida
    if( isset( $_POST['medcantluz'] ) ){

        $ar = $api -> descuentos( $_POST['medcantluz'], $_POST['medtemperatura'], $_POST['medhumedad'] );
        echo $api -> json( $ar );

    }

    // $ar = $api -> descuentos( 50, 20, 50 );
    // echo $api -> json( $ar );