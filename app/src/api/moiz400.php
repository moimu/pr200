<?php

    require '../../vendor/autoload.php';
    use Moi\Zonas\Api;
    header('Content-Type: application/json');

    $api = new Api();
    $db = $api -> db();
    $ar = $api -> consultas( $db );
    echo $api -> json( $ar );