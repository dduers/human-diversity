<?php
require_once '../vendor/autoload.php';

error_reporting(E_ALL & ~E_DEPRECATED);

use Dduers\HumanDiversity\AppController;

AppController::instance()::run();
