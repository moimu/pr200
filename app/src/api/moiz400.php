<?php

    require '../../vendor/autoload.php';
    use Moi\Zonas\Api;
    
    // header('Content-Type: application/json');
    // header('Access-Control-Allow-Origin');

    $api = new Api();
    $ar = $api -> consultas( );
    echo $api -> json( $ar );