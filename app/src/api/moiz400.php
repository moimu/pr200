<?php

require '../../vendor/autoload.php';
use Moi\Zonas\Api;
use Moi\Zonas\mysqli;

$api = new Api();
header('Content-Type: application/json');
// echo $api -> bd();