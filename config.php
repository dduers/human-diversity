<?php
declare(strict_types=1);

spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});
