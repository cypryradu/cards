<?php
$app = require_once '../app/bootstrap.php';

try {
    $app->run();
} catch (Exception $e) {
    echo $e->getMessage();
}
