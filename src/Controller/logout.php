<?php

declare(strict_types=1);

namespace Dduers\HumanDiversity\Controller;

use Dduers\HumanDiversity\AppController;
use Dduers\HumanDiversity\Service\AuthService;

final class logout extends AppController
{
    function get()
    {
        AuthService::instance()::logout();
        self::_reroute('home');
    }
}
