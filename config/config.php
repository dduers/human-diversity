<?php

declare(strict_types=1);

use Dduers\PDOXpress\PDOXpressConnection;

require_once '../vendor/autoload.php';

$_CONFIG = [
    'database_server' => 'danield4.mysql.db.internal',
    'database_port' => '3306',
    'database_name' => 'danield4_humdiv',
    'database_user' => 'danield4_humdiv',
    'database_password' => 'of7eXLNndHS6x9mB9!op',
];

if (isset($_GET['count'])) {
    if (($_GET['count'] ?? 0) < 2)
        $_GET['count'] = 2;
    if (($_GET['count'] ?? 0) > 18)
        $_GET['count'] = 18;
}

$_DBC = new PDOXpressConnection(
    'mysql:host=' . $_CONFIG['database_server'] . ';dbname=' . $_CONFIG['database_name'],
    $_CONFIG['database_user'],
    $_CONFIG['database_password']
);
