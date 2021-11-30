<?php

    require '../../vendor/autoload.php';
    use Moi\Zonas\Api;
    
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin');

    $api = new Api();
    $db = $api -> db();
    $ar = $api -> consultas( $db );
    echo $api -> json( $ar );