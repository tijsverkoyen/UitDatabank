<?php

require_once 'config.php';
require_once __DIR__ . '/../vendor/autoload.php';

use TijsVerkoyen\UitDatabank\UitDatabank;
use TijsVerkoyen\UitDatabank\Search\Filter;

$uitDatabank = new UitDatabank(
    KEY,
    SECRET,
    SERVER
);

try {
    $filter = new Filter();
    $filter->setQ('*:*');
    $filter->setRows(500);
    $response = $uitDatabank->search($filter);

} catch (Exception $e) {
    var_dump($e);
}

// output
var_dump($response);
